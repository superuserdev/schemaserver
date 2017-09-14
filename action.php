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
use \InvalidArgumentException;
class Action extends Thing
{
	use Traits\DateTime;

	/**
	 * [setActionStatus description]
	 * @param ActionStatusType $status [description]
	 */
	final public function setActionStatus(ActionStatusType $status): self
	{
		return $this->_set('actionStatus', $status);
	}

	/**
	 * [setAgent description]
	 * @param Thing $agent [description]
	 */
	final public function setAgent(Thing $agent): self
	{
		if ($agent instanceof Person or $agent instanceof Organization) {
			return $this->_set('agent', $agent);
		} else {
			throw new InvalidArgumentException(sprintf(
				'Author must be an instance of Person or Organization. Instance of %s given',
				$agent::getType()
			));
		}
	}

	/**
	 * [setEndDate description]
	 * @param String  $date     [description]
	 * @param boolean $use_date [description]
	 * @param boolean $use_time [description]
	 */
	final public function setEndDate(
		String $date,
		Bool   $use_date = true,
		Bool   $use_time = true
	): self
	{
		return $this->_set('endDate', static::formatDateTime($date, $use_date, $use_time));
	}

	/**
	 * [setError description]
	 * @param Thing $error [description]
	 */
	final public function setError(Thing $error): self
	{
		return $this->_set('error', $error);
	}

	/**
	 * [setLocation description]
	 * @param Thing $location [description]
	 */
	final public function setLocation(Thing $location): self
	{
		if ($location instanceof PostalAddress or $location instanceof Place) {
			return $this->_set('location', $location);
		} else {
			throw new InvalidArgumentException(sprintf(
				'Location must be an instance of PostalAddress or Place. Instance of %s given.',
				$location::getType()
			));
		}
	}

	/**
	 * [setObject description]
	 * @param Thing $object [description]
	 */
	final public function setObject(Thing $object): self
	{
		return $this->_set('object', $object);
	}

	/**
	 * [setParticipant description]
	 * @param Thing $participant [description]
	 */
	final public function setParticipant(Thing $participant)
	{
		if ($participant instanceof Person or $participant instanceof Organization) {
			return $this->_set('participant', $participant);
		} else {
			throw new InvalidArgumentException(sprintf(
				'Participant must be an instance of Person or Organization. Instance of %s given.',
				$participant::getType()
			));
		}
	}

	/**
	 * [setResult description]
	 * @param Thing $result [description]
	 */
	final public function setResult(Thing $result)
	{
		return $this->_set('result', $result);
	}

	/**
	 * [setStartDate description]
	 * @param String  $date     [description]
	 * @param boolean $use_date [description]
	 * @param boolean $use_time [description]
	 */
	final public function setStartDate(
		String $date,
		Bool   $use_date = true,
		Bool   $use_time = true
	)
	{
		return $this->_set('startDate', static::formatDateTime($date, $use_date, $use_time));
	}

	/**
	 * [setTarget description]
	 * @param EntryPoint $target [description]
	 */
	final public function setTarget(EntryPoint $target)
	{
		return $this->_set('target', $target);
	}
}
