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
	 * @param  String $prop  [description]
	 * @param  [type] $value [description]
	 * @return Thing         [description]
	 */
	final protected function _set(String $prop, $value): self
	{
		$this->_data[$prop] = $value;
		return $this;
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

	/**
	 * [_isValidValue description]
	 * @param  [type] $value         [description]
	 * @param  String $allowed_types [description]
	 * @return Bool                  [description]
	 */
	final private static function _isValidValue($value, String ...$allowed_types): Bool
	{
		return empty($allowed_types) or in_array(static::_getType($value), $allowed_types);
	}

	/**
	 * [_getType description]
	 * @param  [type] $value [description]
	 * @return String        [description]
	 */
	final private static function _getType($value): String
	{
		return is_object($value) ? get_class($value) : gettype($value);
	}
}
