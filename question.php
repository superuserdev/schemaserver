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
 * @see https://schema.org/Question
 */

class Question extends CreativeWork
{
	final public function setAcceptedAnswer(Answer $answer): self
	{
		return $this->_set('acceptedAnswer', $answer);
	}

	final public function setAnswerCount(Int $count): self
	{
		return $this->_set('answerCount', $count);
	}

	final public function setDownvoteCount(Int $downvotes): self
	{
		return $this->_set('downvotecount', $downvotes);
	}

	final public function setSuggestedAnswer(Answer $answer): self
	{
		return $this->_set('suggestedAnswer', $answer);
	}

	final public function setUpvoteCount(Int $upvotes): self
	{
		return $this->_set('upvoteCount', $upvotes);
	}
}
