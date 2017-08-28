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
 * @see https://schema.org/Action
 */
class Action extends Thing
{
	use Traits\DateTime;

	final public function setActionStatus(ActionStatusType $status)
	{
		$this->_set('actionStatus', $status);
	}

	final public function setAgent(Thing $agent)
	{
		if ($agent instanceof Person or $agent instanceof Organization) {
			$this->_set('agent', $agent);
		} else {
			throw new \InvalidArgumentException(sprintf(
				'Author must be an instance of Person or Organization. Instance of %s given',
				$agent::getType()
			));
		}
	}

	final public function setEndDate(
		String $date,
		Bool   $use_date = true,
		Bool   $use_time = true
	)
	{
		$this->_set('endDate', static::formatDateTime($date, $use_date, $use_time));
	}

	final public function setError(Thing $error)
	{
		$this->_set('error', $error);
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

	final public function setObject(Thing $object)
	{
		$this->_set('object', $object);
	}

	final public function setParticipant(Thing $participant)
	{
		if ($participant instanceof Person or $participant instanceof Organization) {
			$this->_set('participant', $participant);
		} else {
			throw new InvalidArgumentException(sprintf(
				'Participant must be an instance of Person or Organization. Instance of %s given.',
				$participant::getType()
			));
		}
	}

	final public function setResult(Thing $result)
	{
		$this->_set('result', $result);
	}

	final public function setStartDate(
		String $date,
		Bool   $use_date = true,
		Bool   $use_time = true
	)
	{
		$this->_set('startDate', static::formatDateTime($date, $use_date, $use_time));
	}

	final public function setTarget(EntryPoint $target)
	{
		$this->_set('target', $target);
	}
}
