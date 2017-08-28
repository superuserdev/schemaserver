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
namespace SuperUserDev\SchemaServer\Traits;

use \SuperUserDev\SchemaServer\{Thing};

trait Parse
{
	/**
	 * [parseFromArray description]
	 * @param  Array $data [description]
	 * @return Thing       [description]
	 */
	final public static function parseFromArray(Array $data): Thing
	{
		if (array_key_exists('@type', $data)) {
			$type = __NAMESPACE__ . '\\' . $data['@type'];
			return new $type($data);
		} else {
			throw new \RuntimeException('Missing @type attribute');
		}
	}

	/**
	 * [parseFromJSON description]
	 * @param  String $json [description]
	 * @return Thing        [description]
	 */
	final public static function parseFromJSON(String $json): Thing
	{
		$data = json_decode($json, true);
		return static::parseFromArray($data);
	}

	/**
	 * [parseFromPost description]
	 * @param  [type] $key [description]
	 * @return Thing       [description]
	 */
	final public function parseFromPost(String $key = null): Thing
	{
		return static::parseFromArray(isset($key) ? $_POST[$key] : $_POST);
	}
}
