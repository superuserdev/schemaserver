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
 * @see https://schema.org/PriceSpecification
 */
class PriceSpecification extends StructuredValue
{
	use Traits\DataTime;

	/**
	 * [setEligibleQuantity description]
	 * @param QuantitativeValue $quantity [description]
	 */
	final public function setEligibleQuantity(QuantitativeValue $quantity)
	{
		$this->_set('eligibleQuantity', $quantity);
	}

	/**
	 * [setEligibleTransactionVolume description]
	 * @param PriceSpecification $volume [description]
	 */
	final public function setEligibleTransactionVolume(PriceSpecification $volume)
	{
		$this->_set('eligibleTransactionVolume', $volume);
	}

	/**
	 * [setMaxPrice description]
	 * @param Float $price [description]
	 */
	final public function setMaxPrice(Float $price)
	{
		$this->_set('maxPrice', $price);
	}

	/**
	 * [setMinPrice description]
	 * @param Float $price [description]
	 */
	final public function setMinPrice(Float $price)
	{
		$this->_set('minPrice', $price);
	}

	/**
	 * [setPrice description]
	 * @param Float $price [description]
	 */
	final public function setPrice(Float $price)
	{
		$this->_set('price', $price);
	}

	/**
	 * [setPRiceCurrency description]
	 * @param String $currency [description]
	 */
	final public function setPriceCurrency(String $currency)
	{
		$this->_set('priceCurrency', $currency);
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
	 * [setValueAddedTaxIncluded description]
	 * @param Bool $included [description]
	 */
	final public function setValueAddedTaxIncluded(Bool $included)
	{
		$this->_set('valueAddedTaxIncluded', $included);
	}
}
