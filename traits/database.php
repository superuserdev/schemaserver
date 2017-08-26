<?php
/**
 * @author Chris Zuber <chris@chriszuber.com>
 * @package shgysk8zer0/schemaserver
 * @copyright 2017
 * @license https://opensource.org/licenses/LGPL-3.0 GNU Lesser General Public License version 3
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 3.0 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library.
 */
namespace shgysk8zer0\SchemaServer\Traits;

use \PDO;
use \shgysk8zer0\SchemaServer\{Thing};

trait Database
{
	private static $_in_transaction = false;
	/**
	 * [connect description]
	 * @param  String  $username [description]
	 * @param  String  $password [description]
	 * @param  String  $host     [description]
	 * @param  Integer $port     [description]
	 * @param  String  $dbname   [description]
	 * @param  Array   $options  [description]
	 * @return PDO               [description]
	 */
	final public static function connect(
		String $username,
		String $password,
		String $dbname    = null,
		String $host      = 'localhost',
		Int    $port      = 5432,
		Array  $options   = [
			PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_CASE               => PDO::CASE_NATURAL,
			PDO::ATTR_ORACLE_NULLS       => PDO::NULL_NATURAL,
			PDO::ATTR_EMULATE_PREPARES   => false,
			PDO::ATTR_STRINGIFY_FETCHES  => false,
			// PDO::ATTR_STATEMENT_CLASS => [],
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
		]
	): PDO
	{
		$dsn = sprintf('pgsql:dbname=%s;', $dbname ?? $username);
		if ($host !== 'localhost') {
			$dsn .= "host={$host};";
			if ($port !== 5432) {
				$dsn .= "port={$port};";
			}
		}
		$pdo = new PDO($dsn, $username, $password, $options);
		return $pdo;
	}

	/**
	 * [save description]
	 * @param  PDO     $pdo          [description]
	 * @param  boolean $allow_update [description]
	 * @return Thing                 [description]
	 */
	final public function save(PDO $pdo, Bool $allow_update = false): Thing
	{
		if (! $in_transaction = $pdo->inTransaction()) {
			$pdo->beginTransaction();
		}
		if (! isset($this->identifier)) {
			$this->_set('identifier', $this->{'@id'} ?? md5($this));
		}
		$params = new \stdClass();
		$params->keys = [];
		$params->bindings = [];
		$params = array_reduce($this->keys(), function(\stdClass $carry, String $item): \stdClass
		{
			array_push($carry->keys, sprintf('"%s"', strtolower($item)));
			array_push($carry->bindings, ":{$item}");
			return $carry;
		}, $params);

		$sql = sprintf(
			'INSERT INTO %s (%s) VALUES (%s);',
			static::getType(),
			join(', ', $params->keys),
			join(', ', $params->bindings)
		);

		$stm = $pdo->prepare($sql);
		// $stm->bindValue(':identifier', $id);

		forEach($this->_data as $key => $value) {
			if ($value instanceof Thing) {
				$saved = json_encode([
					'@type' => $value::getType(),
					'@id' => md5($value->save($pdo, $allow_update))
				]);
				$stm->bindValue(":{$key}", $saved);
				echo "$key: $saved\n";
			} else {
				echo "$key: $value\n";
				$stm->bindValue(":{$key}", $value);
			}
		}

		echo $sql . PHP_EOL;
		try {
			$stm->execute();
			if (! $in_transaction) {
				$pdo->commit();
			}
		} catch (\Throwable $e) {
			echo $e->getMessage() . PHP_EOL;
			$pdo->rollBack();
			throw $e;
		}
		return $this;
	}

	/**
	 * [update description]
	 * @param  String $identifer [description]
	 * @param  PDO    $pdo       [description]
	 * @return Thing             [description]
	 */
	final public function update(String $identifer, PDO $pdo): Thing
	{
		return $this;
	}

	/**
	 * [get description]
	 * @param  String $identifier [description]
	 * @param  PDO    $pdo        [description]
	 * @param  Array  $params     [description]
	 * @return Thing              [description]
	 */
	final public static function get(
		String $identifier,
		PDO    $pdo,
		Array  $params     = []
	): Thing
	{
		$sql = sprintf('SELECT * FROM %s WHERE identifier = :id LIMIT 1;', static::getType());
		echo $sql . PHP_EOL;
		$stm = $pdo->prepare($sql);
		$stm->execute(['id' => $identifier]);
		$obj = $stm->fetch();
		$obj['@type'] = static::getType();
		$obj['@id'] = $identifier;

		foreach($obj as &$value) {
			if (preg_match(Thing::JSON, $value)) {
				$value = json_decode($value, true);
			}
		}

		$thing = static::parseFromArray(array_filter($obj));
		return $thing;
	}

	/**
	 * [delete description]
	 * @param  String $identifer [description]
	 * @param  PDO    $pdo       [description]
	 * @return Bool              [description]
	 */
	final public static function delete(String $identifier, PDO $pdo): Bool
	{
		$sql = sprintf('DELETE FROM %s WHERE "identifier" = :id LIMIT 1;', static::getType());
		$stm = $pdo->prepare($sql);
		$stm->execute(['id' => $identifier]);
		return $stm->rowCount() > 0;
	}

	final protected function _fetch(PDO $pdo): Thing
	{
		if (!isset($this->{'@type'}, $this->{'@id'})) {
			throw new \Exception(sprintf('Missing @id or @type attribute: [%s]', $this));
		} else {
			return ('\\shgysk8zer0\\SchemaServer\\' . $this->{'@type'})::get($this->{'@id'}, $pdo);
		}
	}

	abstract public function keys(): Array;
}
