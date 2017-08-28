<?php
/**
 * @author Chris Zuber <chris@chriszuber.com>
 * @package superuserdev/schemaserver
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
namespace SuperUserDev\SchemaServer;

/**
 * @see https://schema.org/Thing
 */
class Thing implements \JsonSerializable, \Serializable, \Iterator,
Interfaces\Base, Interfaces\Database
{
	use Traits\Data;
	use Traits\Database;
	Use Traits\Magic;
	use Traits\Serial;
	use Traits\Iterator;
	use Traits\Filters;
	use Traits\Parse;

	const CONTEXT = 'http://schema.org';
	const CONTENT_TYPE = 'application/json';
	const JSON = '/^\s*\{.*\}\s*$/';

	/**
	 * [protected description]
	 * @var Array
	 */
	protected $_data = [];

	/**
	 * [__construct description]
	 * @param array $data [description]
	 */
	final public function __construct(Array $data = [])
	{
		if (array_key_exists('@type', $data)) {
			if ($data['@type'] !== static::getType() and false) {
				throw new \Exception("Invalid type: '{$data['@type']}'");
			}
			unset($data['@type'], $data['@context']);
			if (array_key_exists('@id', $data)) {
				$this->_set('identifier', $data['@id']);
			}

			foreach ($data as $key => $value) {
				try {
					if (is_array($value)) {
						if (array_key_exists('@type', $value)) {
							$this->{$key} = static::parseFromArray($value);
						} else {
							throw new \Error('Unable to create object of unknown @type');
						}
					} else {
						if (is_string($value) and preg_match(self::JSON, $value)) {
							$this->{$key} = static::parseFromJSON($value);
						}
						$this->{$key} =  $value;
					}
				} catch (\Throwable $e) {
					echo $e->getMessage() . PHP_EOL;
				}
			}
		}
	}

	/**
	 * [setAdditionalType description]
	 * @param String $url [description]
	 */
	final public function setAdditionalType(String $url)
	{
		if (static::_isURL($url)) {
			$this->_set('additionalType', $url);
		}
	}

	/**
	 * [setAlternateName description]
	 * @param String $name [description]
	 */
	final public function setAlternateName(String $name)
	{
		$this->_set('alternamteName', $name);
	}

	/**
	 * [setDescription description]
	 * @param String $description [description]
	 */
	final public function setDescription(String $description)
	{
		$this->_set('description', $description);
	}

	final public function setDisambiguatingDescription(String $description)
	{
		$this->_set('disambiguatingDescription', $description);
	}

	/**
	 * [setImage description]
	 * @param ImageObject $image [description]
	 */
	final public function setImage(ImageObject $image)
	{
		$this->_set('image', $image);
	}

	final public function setMainEntityOfPage(CreativeWork $entity)
	{
		$this->_set('mainEntityOfPage', $entity);
	}

	/**
	 * [setName description]
	 * @param String $name [description]
	 */
	final public function setName(String $name)
	{
		$this->_set('name', $name);
	}

	final public function setPOtentialAction(Action $action)
	{
		$this->_set('potentialAction', $action);
	}

	/**
	 * [setSameAs description]
	 * @param String $url [description]
	 */
	final public function setSameAs(String $url)
	{
		if (static::_isURL($url)) {
			$this->_set('sameAs', $url);
		} else {
			throw new \InvalidArgumentException("'{$url}' is not a valid url");
		}
	}

	/**
	 * [setUrl description]
	 * @param String $url [description]
	 */
	final public function setUrl(String $url)
	{
		if (static::_isURL($url)) {
			$this->_set('url', $url);
		} else {
			throw new \InvalidArgumentException("'{$url}' is not a valid url");
		}
	}

	final public function setIdentifier(String $id)
	{
		$this->_set('identifier', $id);
		$scheme = $_SERVER['HTTPS'] ? 'http' : 'https';
		$this->_set('@id', "{$scheme}://{$_SERVER['HTTP_HOST']}/{$this::getType()}/{$id}");
	}
}
