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

trait Magic
{
	/**
	 * [__isset description]
	 * @param  String  $prop [description]
	 * @return boolean       [description]
	 */
	final public function __isset(String $prop): Bool
	{
		return array_key_exists($prop, $this->_data);
	}

	/**
	 * [__unset description]
	 * @param String $prop [description]
	 */
	final public function __unset(String $prop): Void
	{
		unset($this->_data[$prop]);
	}

	/**
	 * [__set description]
	 * @param String $prop  [description]
	 * @param [type] $value [description]
	 */
	final public function __set(String $prop, $value): Void
	{
		$method = ucfirst($prop);

		if (method_exists($this, "set{$method}")) {
			call_user_func([$this, "set{$method}"], $value);
		}
	}

	/**
	 * [__get description]
	 * @param  String $prop [description]
	 * @return [type]       [description]
	 */
	final public function __get(String $prop)
	{
		if (isset($this->$prop)) {
			return $this->_data[$prop];
		} else {
			throw new Error("Invalid property, {$prop}.");
		}
	}

	/**
	 * [__debugInfo description]
	 * @return [type] [description]
	 */
	final public function __debugInfo(): Array
	{
		return $this->_data;
	}

	/**
	 * [__toString description]
	 * @return string [description]
	 */
	final public function __toString(): String
	{
		return json_encode($this);
	}
}
