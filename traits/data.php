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

trait Data
{
	/**
	 * [keys description]
	 * @return Array [description]
	 */
	final public function keys(): Array
	{
		return array_keys($this->_data);
	}

	/**
	 * [_set description]
	 * @param String $prop  [description]
	 * @param [type] $value [description]
	 */
	final protected function _set(String $prop, $value)
	{
		$this->_data[$prop] = $value;
	}

	/**
	 * [getType description]
	 * @return String [description]
	 */
	final public static function getType(): String
	{
		$class_path = explode('\\', static::class);
		return @end($class_path);
	}

	/**
	 * [getInfo description]
	 * @return Array [description]
	 */
	final public static function getInfo(): Array
	{
		return [
			'@type'    => static::getType(),
			'@context' => static::CONTEXT,
		];
	}
}
