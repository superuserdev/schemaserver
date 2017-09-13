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
 * @see https://schema.org/Message
 */
class Message extends CreativeWork
{
	final public function setBccRecipient(Thing $recipient)
	{
		if (
			$recipient instanceof ContactPoint
			or $recipient instanceof Organization
			or $recipient instanceof Person
		) {
			$this->_set('bccRecipient', $recipient);
		} else {
			throw new \InvalidArgumentException(sprintf(
				'Recipient must be an instance of ContactPoint, Organization, or Person. Instance of %s given',
				$recipient::getType()
			));
		}
	}

	final public function setCcRecipient(Thing $recipient)
	{
		if (
			$recipient instanceof ContactPoint
			or $recipient instanceof Organization
			or $recipient instanceof Person
		) {
			$this->_set('ccRecipient', $recipient);
		} else {
			throw new \InvalidArgumentException(sprintf(
				'Recipient must be an instance of ContactPoint, Organization, or Person. Instance of %s given',
				$recipient::getType()
			));
		}
	}

	final public function setDateRead(String $datetime)
	{
		$this->_set('dateRead', static::formatDate($date, true, true));
	}

	final public function setDateReceived(String $datetime)
	{
		$this->_set('dateReceived', static::formatDate($date, true, true));
	}

	final public function setDateSent(String $datetime)
	{
		$this->_set('dateSent', static::formatDate($date, true, true));
	}

	final public function setMessageAttachment(CreativeWork $attachement)
	{
		$this->_set('messageAtachment', $attachment);
	}

	final public function setRecipient(Thing $recipient)
	{
		if (
			$recipient instanceof Audience
			or $recipient instanceof ContactPoint
			or $recipient instanceof Organization
			or $recipient instanceof Person
		) {
			$this->_set('recipient', $recipient);
		} else {
			throw new \InvalidArgumentException(sprintf(
				'Recipient must be an instance of Audience, ContactPoint, Organization, or Person. Instance of %s given',
				$recipient::getType()
			));
		}
	}

	final public function setSender(Thing $sender)
	{
		if (
			$sender instanceof Audience
			or $sender instanceof Organization
			or $sender instanceof Person
		) {
			$this->_set('sender', $sender);
		} else {
			throw new \InvalidArgumentException(sprintf(
				'Recipient must be an instance of ContactPoint, Organization, or Person. Instance of %s given',
				$sender::getType()
			));
		}
	}

	final public function setToRecipient(Thing $recipient)
	{
		if (
			$recipient instanceof Audience
			or $recipient instanceof ContactPoint
			or $recipient instanceof Organization
			or $recipient instanceof Person
		) {
			$this->_set('toRecipient', $recipient);
		} else {
			throw new \InvalidArgumentException(sprintf(
				'Recipient must be an instance of Audience, ContactPoint, Organization, or Person. Instance of %s given',
				$recipient::getType()
			));
		}
	}
}
