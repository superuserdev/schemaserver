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
		String $host      = 'localhost',
		Int    $port      = 5432,
		String $dbname    = null,
		Array  $options   = []
	): PDO
	{
		$dsn = sprintf('pgsql:dbname=%s;', $dbname ?? $username);
		if ($host !== 'localhost') {
			$dsn .= "host={$host};";
			if ($port !== 5432) {
				$dsn .= "port={$port};";
			}
		}
		return new PDO($dsn, $username, $password, $options);
	}

	/**
	 * [save description]
	 * @param  PDO     $pdo          [description]
	 * @param  boolean $allow_update [description]
	 * @return Thing                 [description]
	 */
	final public function save(PDO $pdo, Bool $allow_update = false): Thing
	{
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
	final public static function get(String $identifier, PDO $pdo, Array $params = []): Thing
	{
		return new Thing();
	}

	/**
	 * [delete description]
	 * @param  String $identifer [description]
	 * @param  PDO    $pdo       [description]
	 * @return Bool              [description]
	 */
	final public static function delete(String $identifer, PDO $pdo): Bool
	{
		return true;
	}
}
