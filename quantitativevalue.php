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
 * @see https://schema.org/QuantitativeValue
 */
class QuantitativeValue extends StructuredValue
{
	/**
	 * [setAdditionalProperty description]
	 * @param PropertyValue $prop [description]
	 */
	final public function setAdditionalProperty(PropertyValue $prop)
	{
		$this->_set('additionalProperty', $prop);
	}

	/**
	 * [setMaxValue description]
	 * @param Float $value [description]
	 */
	final public function setMaxValue(Float $value)
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
	 * [setUnitCode description]
	 * @param String $code [description]
	 */
	final public function setUnitCode(String $code)
	{
		$this->_set('unitCode', $code);
	}

	/**
	 * [setUnitText description]
	 * @param String $text [description]
	 */
	final public function setUnitText(String $text)
	{
		$this->_set('unitText', $text);
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

	/**
	 * [setValueReference description]
	 * @param Thing $reference [description]
	 */
	final public function setValueReference(Thing $reference)
	{
		if (
			$reference instanceof Enumeration
			or $reference instanceof StructuredValue
		) {
			$this->_set('valueReference', $reference);
		} else {
			throw new \InvalidArgumentException(sprintf(
				'Reference must me an instance of Enumeration or StructuredValue. Instance of %s given',
				$reference::getType()
			));
		}
	}
}
