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
 * @see https://schema.org/CreativeWork
 */
class CreativeWork extends Thing
{
	use Traits\DateTime;

	/**
	 * [setAbout description]
	 * @param Thing $about [description]
	 */
	final public function setAbout(Thing $about)
	{
		$this->_set('about', $about);
	}

	final public function setAccessMode(String $access_mode)
	{
		$this->_set('accessMode', $access_mode);
	}

	final public function setAccessModeSufficient(String $modes)
	{
		$this->_set('accessModeSufficient', $modes);
	}

	final public function setAccessibilityAPI(String $resource)
	{
		$this->_set('accessAPI', $resource);
	}

	final public function setAccessibilityControl(String $control)
	{
		$this->_set('accessibilitiyControl', $control);
	}

	final public function setAccessibilityFeature(String $feature)
	{
		$this->_set('accessibilityFeature', $feature);
	}

	final public function setAccessibilityHazard(String $hazard)
	{
		$this->_set('accessibilityHazard', $hazard);
	}

	final public function setAccessibilitySummary(String $summary)
	{
		$this->_set('accessibilitySummary', $summary);
	}

	final public function setAccountablePerson(Peron $person)
	{
		$this->_set('accountablePerson', $person);
	}

	final public function setAggregateRating(AggregateRating $rating)
	{
		$this->_set('aggregateRating', $rating);
	}

	final public function setAlternativeHeadline(String $alt_headline)
	{
		$this->_set('alternativeHeadline', $alt_headline);
	}

	final public function setAudience(Audience $audience)
	{
		$this->_set('audience', $audience);
	}

	final public function setAudio(AudioObject $audio)
	{
		$this->_set('audio', $audio);
	}

	final public function setAuthor(Thing $author)
	{
		if ($author instanceof Person or $author instanceof Organization) {
			$this->_set('author', $author);
		} else {
			throw new \InvalidArgumentException(sprintf(
				'Author must be an instance of Person or Organization. Instance of %s given',
				$author::getType()
			));
		}
	}

	final public function setAward(String $award)
	{
		$this->_set('award', $award);
	}

	final public function setCharacter(Person $character)
	{
		$this->_set('character', $character);
	}

	final public function setCitation(CreativeWork $citation)
	{
		$this->_set('citation', $citation);
	}

	final public function setComment(Comment $comment)
	{
		$this->_set('comment', $comment);
	}

	final public function setCommentCount(Int $comment_count)
	{
		$this->_set('commentCount', $comment_count);
	}

	final public function setContentLocation(Place $location)
	{
		$this->_set('contentLocation', $location);
	}

	final public function setContentRating(String $rating)
	{
		$this->_set('contentRating', $rating);
	}

	final public function setContributor(Thing $contributor)
	{
		if ($contributor instanceof Person or $contributor instanceof Organization) {
			$this->_set('contributor', $contributor);
		} else {
			throw new \InvalidArgumentException(sprintf(
				'Contributor must be an instance of Person or Organization. Instance of %s given',
				$contributor::getType()
			));
		}
	}

	final public function setCopyRightHolder(Thing $copyright_holder)
	{
		if ($copyright_holder instanceof Person or $copyright_holder instanceof Organization) {
			$this->_set('copyrightHolder', $copyright_holder);
		} else {
			throw new \InvalidArgumentException(sprintf(
				'Copyright Holder must be an instance of Person or Organization. Instance of %s given',
				$copyright_holder::getType()
			));
		}
	}

	final public function setCopyrightYear(Int $year)
	{
		$this->_set('copyrightYear', $year);
	}

	final public function setCreator(Thing $creator)
	{
		if ($creator instanceof Person or $creator instanceof Organization) {
			$this->_set('creator', $creator);
		} else {
			throw new \InvalidArgumentException(sprintf(
				'Creator Holder must be an instance of Person or Organization. Instance of %s given',
				$creator::getType()
			));
		}
	}
}
