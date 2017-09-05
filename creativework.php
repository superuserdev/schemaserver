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
		$this->_set('accessibilityAPI', $resource);
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

	final public function setDateCreated(String $created, Bool $use_time = true)
	{
		$this->_set('dateCreated', static::formatDate($created, true, $use_time));
	}

	final public function setDatModified(String $created)
	{
		$this->_set('dateModified', static::formatDate($created, true, false));
	}

	final public function setDatePublished(String $created, Bool $use_time = true)
	{
		$this->_set('datePublished', static::formatDate($created, true, $use_time));
	}

	final public function setDiscussionUrl(String $discussion_url)
	{
		if (static::_isURL($discussion_url)) {
			$this->_se('discussionUrl', $discussionUrl);
		} else {
			throw new \InvalidArgumentException("{$discussionUrl} is not a valid URL");
		}
	}

	final public function setEditor(Person $editor)
	{
		$this->_set('editor', $editor);
	}

	final public function setEducationalAlignment(AlignmentObject $alignment)
	{
		$this->_set('educationalAlignment', $alignment);
	}

	final public function setEducationalUse(String $use)
	{
		$this->_set('educationalUse', $use);
	}

	final public function setEncoding(MediaObject $media)
	{
		$this->_set('encoding', $media);
	}

	final public function setExampleOfWork(CreativeWork $example)
	{
		$this->_set('exampleOfWork', $example);
	}

	final public function setExpires(String $expires)
	{
		$this->_set('expires', static::formatDate($expires, true, false));
	}

	final public function setFileFormat(String $format)
	{
		$this->_set('fileFormat', $format);
	}

	final public function setFunder(Thing $funder)
	{
		if ($funder instanceof Person or $funder instanceof Organization) {
			$this->_set('funder', $funder);
		} else {
			throw new \InvalidArgumentException(sprintf(
				'Funder must be an instance of Person or Organization. Instance of %s given',
				$funder::getType()
			));
		}
	}

	final public function setGenre(String $genre)
	{
		$this->_set('genre', $genre);
	}

	final public function setHasPart(CreativeWork $part)
	{
		$this->_set('hasPart', $part);
	}

	final public function setHeadline(String $headline)
	{
		$this->_set('headline', $headline);
	}

	final public function setLanguage(Language $lang)
	{
		$this->_set('language', $lang);
	}

	// final public function setInteractionStatistic(InteractionCounter $service)
	// {
	// 	$this->_set('interactionStatistic', $service);
	// }

	final public function setInteractivityType(String $type)
	{
		$this->_set('interactivityType', $type);
	}

	final public function setIsAccessibleForFree(Bool $is_free)
	{
		$this->_set('isAccessibleForFree', $is_free);
	}

	final public function setIsBasedOn(Thing $based_on)
	{
		if ($based_on instanceof CreativeWork or $based_on instanceof Product) {
			$this->_set('isBasedOn', $based_on);
		} else {
			throw new \InvalidArgumentException(sprintf(
				'isBasedOn must be an instance of CreativeWork or Product. %s given',
				$based_on::getType()
			));
		}
	}

	final public function setIsFamilyFriendly(Bool $family_friendly)
	{
		$this->_set('isFamilyFriendly', $family_friendly);
	}

	final public function setIsPartOf(CreativeWork $work)
	{
		$this->_set('isPartOf', $work);
	}

	final public function setKeywords(String $keywords)
	{
		$this->_set('keywords', $keywords);
	}

	final public function setLearningResourceType(String $type)
	{
		$this->_set('learningResourceType', $type);
	}

	final public function setLicense(CreativeWork $license)
	{
		$this->_set('license', $license);
	}

	final public function setLocationCreated(Place $location)
	{
		$this->_set('locationCreated', $location);
	}

	final public function setMainEntity(Thing $entity)
	{
		$this->_set('mainEntity', $entity);
	}

	final public function setMaterial(Product $material)
	{
		$this->_set('material', $material);
	}

	final public function setMentions(Thing $mentioned)
	{
		$this->_set('mentions', $mentioned);
	}

	final public function setOffers(Offer $offered)
	{
		$this->_set('offers', $offered);
	}

	final public function setPosition(Int $position)
	{
		$this->_set('position', $position);
	}

	final public function setProducer(Thing $producer)
	{
		if ($producer instanceof Person or $producer instanceof Organization) {
			$this->_set('producer', $producer);
		} else {
			throw new \InvalidArgumentException(sprintf(
				'Producer must be an instance of Person or Organization. Instance of %s given',
				$producer::getType()
			));
		}
	}

	final public function setProvider(Thing $provider)
	{
		if ($provider instanceof Person or $provider instanceof Organization) {
			$this->_set('provider', $provider);
		} else {
			throw new \InvalidArgumentException(sprintf(
				'Provider must be an instance of Person or Organization. Instance of %s given',
				$provider::getType()
			));
		}
	}

	final public function setPublication(PublicationEvent $publication)
	{
		$this->_set('publication', $publication)
	}

	final public function setPublisher(Thing $publisher)
	{
		if ($publisher instanceof Person or $publisher instanceof Organization) {
			$this->_set('publisher', $publisher);
		} else {
			throw new \InvalidArgumentException(sprintf(
				'Publisher must be an instance of Person or Organization. Instance of %s given',
				$publisher::getType()
			));
		}
	}

	final public function setPublishingPrinciples(CreativeWork $principles)
	{
		$this->_set('publisingPrinciples', $principles);
	}

	final public function setRecordedAt(Event $event)
	{
		$this->_set('recordedAt', $event);
	}

	final public function setReleasedEvent(PublicationEvent $released)
	{
		$this->_seet('releasedEvent', $released);
	}

	final public function setReview(Review $review)
	{
		$this->_set('review', $review);
	}

	final public function setSchemaVersion(String $version)
	{
		$this->_set('schemaVersion', $version);
	}

	final public function setSourceOrganization(Organization $source)
	{
		$this->_set('sourceOrganization', $source);
	}

	final public function setSpatialCoverage(Place $covers)
	{
		$this->_set('spatialCoverage', $covers);
	}

	final public function setSponsor(Thing $sponsor)
	{
		if ($sponsor instanceof Person or $sponsor instanceof Organization) {
			$this->_set('sponsor', $sponsor);
		} else {
			throw new \InvalidArgumentException(sprintf(
				'Sponsor must be an instance of Person or Organization. Instance of %s given',
				$sponsor::getType()
			));
		}
	}

	final public function setTemporalCoverage(String $coverage)
	{
		$this->_set('temporalCoverage', $coverage);
	}

	final public function setText(String $text)
	{
		$this->_set('text', $text);
	}

	final public function setThumbnailUrl(String $url)
	{
		if (static::_isURL($url)) {
			$this->_set('thumbnailUrl', $url);
		} else {
			throw new \InvalidArgumentException("{$url} is not a valid URL");
		}
	}

	final public function setTimeRequired(Duration $duration)
	{
		$this->_set('timeRequired', $duration);
	}

	final public function setTranslator(Thing $translator)
	{
		if ($translator instanceof Person or $translator instanceof Organization) {
			$this->_set('translator', $translator);
		} else {
			throw new \InvalidArgumentException(sprintf(
				'Translator must be an instance of Person or Organization. Instance of %s given',
				$translator::getType()
			));
		}
	}

	final public function setTypicalAgeRange(String $age_range)
	{
		$this->_set('typicalAgeRange', $age_range);
	}

	final public function setVersion(String $version)
	{
		$this->_set('version', $version);
	}

	final public function setVideo(VideoObject $video)
	{
		$this->_set('video', $video);
	}

	final public function setWorkExample(CreativeWork $example)
	{
		$this->_set('workExample', $example);
	}
}
