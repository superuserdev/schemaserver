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
 * @see https://schema.org/LocalBusiness
 */
class LocalBusiness extends Organization
{
	final public function setCurrenciesAccepted(String $currencies)
	{
		$this->_set('currenciesAccepted', $currencies);
	}

	final public function setOpeningHours(String $hours)
	{
		$this->_set('openingHours', $hours);
	}

	final public function setPatemntAccepted(String $method)
	{
		$this->_set('paymentAccepted', $method);
	}

	final public function setPriceRange(String $range)
	{
		$htis->_set('priceRange', $range);
	}
}
