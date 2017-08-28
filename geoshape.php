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
 * @see https://schema.org/GeoShape
 * @todo Add validation for each type of geometric points types (box, circle, line, & polygon)
 */
class GeoShape extends StructuredValue //implements Interfaces\GeoShapeHelper
{
	/**
	 * [setAddress description]
	 * @param PostalAddress $address [description]
	 */
	final public function setAddress(PostalAddress $address)
	{
		$this->_set('address', $address);
	}

	/**
	 * [setAddressCountry description]
	 * @param Country $country [description]
	 */
	final public function setAddressCountry(Country $country)
	{
		$this->_set('addressCountry', $country);
	}

	/**
	 * [setBox description]
	 * @param String $geo_points [description]
	 */
	final public function setBox(String $geo_points)
	{
		$this->_set('box', $geo_points);
	}

	/**
	 * [setCircle description]
	 * @param String $geo_points [description]
	 */
	final public function setCircle(String $geo_points)
	{
		$this->_set('circle', $geo_points);
	}

	/**
	 * [setElevation description]
	 * @param Float $elevation [description]
	 */
	final public function setElevation(Float $elevation)
	{
		$this->_set('elevation', $elevation);
	}

	/**
	 * [setLine description]
	 * @param String $geo_points [description]
	 */
	final public function setLine(String $geo_points)
	{
		$this->_set('line', $geo_points);
	}

	/**
	 * [setPolygon description]
	 * @param String $geo_points [description]
	 */
	final public function setPolygon(String $geo_points)
	{
		$this->_set('polygon', $geo_points);
	}

	/**
	 * [setPostalCode description]
	 * @param Int $postal_code [description]
	 */
	final public function setPostalCode(Int $postal_code)
	{
		$this->_set('postalCode', $postal_code);
	}
}
