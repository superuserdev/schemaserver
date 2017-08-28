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
 * @see https://schema.org/PostalAddress
 */
class PostalAddress extends ContactPoint
{
	final public function setAddressCountry(Country $country)
	{
		$this->_set('addressCountry', $country);
	}

	final public function setAddressLocality(String $locality)
	{
		$this->_set('addressLocality', $locality);
	}

	final public function setAddressRegion(String $region)
	{
		$this->_set('addressRegion', $region);
	}

	final public function setPostOfficeBoxNumber(String $po_box)
	{
		$this->_set('postaOfficeBoxNumber', $po_box);
	}

	final public function setPostalCode(Int $postal_code)
	{
		$this->_set('postalCode', $postal_code);
	}

	final public function setStreetAddress(String $address)
	{
		$this->_set('streetAddress', $address);
	}
}
