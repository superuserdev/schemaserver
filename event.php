<?php
/**
 * @author Chris Zuber <chris@chriszuber.com>
 * @package shgysk8zer0/schemaserver
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
namespace shgysk8zer0\SchemaServer;

/**
 * @see https://schema.org/Event
 */
use \InvalidArgumentException;

class Event extends Thing implements Interfaces\DateTime
{
	use Traits\DateTime;

	final public function setAbout(Thing $thing)
	{
		$this->_set('about', $thing);
	}

	final public function setEndDate(
		String $date,
		Bool   $use_date = true,
		Bool   $use_time = true
	)
	{
		$this->_set('endDate', static::formatDateTime($date, $use_date, $use_time));
	}

	final public function setLocation(Thing $location)
	{
		if ($location instanceof PostalAddress or $location instanceof Place) {
			$this->_set('location', $location);
		} else {
			throw new InvalidArgumentException(sprintf(
				'Location must be an instance of PostalAddress or Place. Instance of %s given.',
				$location::getType()
			));
		}
	}

	final public function setOrganizer(Thing $organizer)
	{
		if ($organizer instanceof Person or $organizer instanceof Organization) {
			$this->_set('organizer', $organizer);
		} else {
			throw new InvalidArgumentException(sprintf(
				'Location must be an instance of Person or Organization. Instance of %s given.',
				$organizer::getType()
			));
		}
	}

	final public function setStartDate(
		String $date,
		Bool   $use_date = true,
		Bool   $use_time = true
	)
	{
		$this->_set('startDate', static::formatDateTime($date, $use_date, $use_time));
	}
}
