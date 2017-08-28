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
 * @see https://schema.org/OpeningHoursSpecification
 */
class OpeningHoursSpecification extends StructuredValue
{
	use Traits\DateTime;

	final public function setCloses(String $time)
	{
		$this->_set('closes', static::formatDate($time, false, true));
	}

	final public function setDayOfWeek(DayOfWeek $day)
	{
		$this->_set('dayOfWeek', $day);
	}

	final public function setOpens(String $time)
	{
		$this->_set('opens', static::formatDate($time, false, true));
	}

	final public function setValidFrom(String $date)
	{
		$this->_set('validFrom', static::formatDate($date, true, false));
	}

	final public function setValidThrough(String $date)
	{
		$this->_set('validThrough', static::formatDate($date, true, false));
	}
}
