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
 * @see https://schema.org/GeoCoordinates
 */
class GeoCoordinates extends StructuredValue
{
	use Traits\Address;

	/**
	 * [setAddressCountry description]
	 * @param [type] $country [description]
	 */
	final public function setAddressCountry(Country $country): self
	{
		return $this->_set('addressCountry', $country);
	}

	/**
	 * [setElevation description]
	 * @param Float $elevation [description]
	 */
	final public function setElevation(Float $elevation): self
	{
		return $this->_set('elevation', $elevation);
	}

	/**
	 * [setLatitude description]
	 * @param Float $latitude [description]
	 */
	final public function setLatitude(Float $latitude): self
	{
		return $this->_set('latitude', $latitude);
	}

	/**
	 * [setLongitude description]
	 * @param Float $longitude [description]
	 */
	final public function setLongitude(Float $longitude): self
	{
		return $this->_set('longitude', $longitude);
	}

	/**
	 * [setPostalCode description]
	 * @param Int $postal_code [description]
	 */
	final public function setPostalCode(Int $postal_code): self
	{
		return $this->_set('postalCode', $postal_code);
	}

	/**
	 * [setGeoUri description]
	 * @return Void [description]
	 */
	final public function setGeoUri(): Void
	{
		if (! isset($this->latitude, $this->longitude)) {
			throw new \RuntimeException('Need longitude and latitude to set geo: URI');
		} else {
			$uri = "geo:{$this->latitude},{$this->longitude}";
			if ( isset($this->elevation)) {
				$uri .= ",{$this->elevation}";
			}

			return $this->_set('url', $uri);
		}
	}
}
