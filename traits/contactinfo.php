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

trait ContactInfo
{
	/**
	 * [setEmail description]
	 * @param String $email [description]
	 */
	final public function setEmail(String $email): Thing
	{
		if (static::_isEmail($email)) {
			return $this->_set('email', $email);
		} else {
			throw new \InvalidArgumentException("'{$email}' is not a valid email");
		}
	}

	final public function setTelephone(String $tel): Thing
	{
		return $this->_set('telephone', $tel);
	}

	final public function setFaxNumber(String $fax): Thing
	{
		return $this->_set('faxNumber', $fax);
	}
}
