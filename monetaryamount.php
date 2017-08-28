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
 * @see https://schema.org/MonetaryAmount
 */
class MonetaryAmount extends StructuredValue
{
	/**
	 * [setCurrency description]
	 * @param String $currency [description]
	 */
	final public function setCurrency(String $currency)
	{
		$this->_set('currency', $currency);
	}

	/**
	 * [setMaxValue description]
	 * @param Floar $value [description]
	 */
	final public function setMaxValue(Floar $value)
	{
		$this->_set('maxValue', $value);
	}

	/**
	 * [setMinValue description]
	 * @param Float $value [description]
	 */
	final public function setMinValue(Float $value)
	{
		$this->_set('minValue', $value);
	}

	/**
	 * [setValidFrom description]
	 * @param String $date [description]
	 */
	final public function setValidFrom(String $date)
	{
		$this->_set('validFrom', static::formatDateTime($date, true, false));
	}

	/**
	 * [setValidThrough description]
	 * @param String $date [description]
	 */
	final public function setValidThrough(String $date)
	{
		$this->_set('validThrough', static::formatDateTime($date, true, false));
	}

	/**
	 * [setValue description]
	 * @param mixed $value Number, Text, Boolean, or StructuredValue
	 * @todo Handle setting properties that can be of simple or complex objects
	 */
	final public function setValue($value)
	{
		$this->_set('value', $value);
	}
}
