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

/**
 * @see http://php.net/manual/en/class.iterator.php
 */
trait Iterator
{
	/**
	 * [private description]
	 * @var Int
	 */
	private $_iterator = 0;

	/**
	 * [private description]
	 * @var Array
	 */
	private $_keys = [];

	/**
	 * [current description]
	 * @return mixed [description]
	 */
	final public function current()
	{
		return $this->{$this->key()};
	}

	/**
	 * [key description]
	 * @return String [description]
	 */
	final public function key(): String
	{
		return $this->_keys[$this->_iterator];
	}

	/**
	 * [next description]
	 * @return Void [description]
	 */
	final public function next(): Void
	{
		$this->_iterator++;
	}

	/**
	 * [rewind description]
	 * @return Void [description]
	 */
	final public function rewind(): Void
	{
		$this->_iterator = 0;
		$this->_keys = array_keys($this->_data);
	}

	/**
	 * [valid description]
	 * @return Bool [description]
	 */
	final public function valid(): Bool
	{
		return $this->_iterator < count($this->_keys);
	}
}
