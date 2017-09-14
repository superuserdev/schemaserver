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
	final public function setAbout(Thing $about): self
	{
		return $this->_set('about', $about);
	}

	final public function setAccessMode(String $access_mode): self
	{
		return $this->_set('accessMode', $access_mode);
	}

	final public function setAccessModeSufficient(String $modes): self
	{
		return $this->_set('accessModeSufficient', $modes);
	}

	final public function setAccessibilityAPI(String $resource): self
	{
		return $this->_set('accessibilityAPI', $resource);
	}

	final public function setAccessibilityControl(String $control): self
	{
		return $this->_set('accessibilitiyControl', $control);
	}

	final public function setAccessibilityFeature(String $feature): self
	{
		return $this->_set('accessibilityFeature', $feature);
	}

	final public function setAccessibilityHazard(String $hazard): self
	{
		return $this->_set('accessibilityHazard', $hazard);
	}

	final public function setAccessibilitySummary(String $summary): self
	{
		return $this->_set('accessibilitySummary', $summary);
	}

	final public function setAccountablePerson(Peron $person): self
	{
		return $this->_set('accountablePerson', $person);
	}

	final public function setAggregateRating(AggregateRating $rating): self
	{
		return $this->_set('aggregateRating', $rating);
	}

	final public function setAlternativeHeadline(String $alt_headline): self
	{
		return $this->_set('alternativeHeadline', $alt_headline);
	}

	final public function setAudience(Audience $audience): self
	{
		return $this->_set('audience', $audience);
	}

	final public function setAudio(AudioObject $audio): self
	{
		return $this->_set('audio', $audio);
	}

	final public function setAuthor(Thing $author): self
	{
		if ($author instanceof Person or $author instanceof Organization) {
			return $this->_set('author', $author);
		} else {
			throw new \InvalidArgumentException(sprintf(
				'Author must be an instance of Person or Organization. Instance of %s given',
				$author::getType()
			));
		}
	}

	final public function setAward(String $award): self
	{
		return $this->_set('award', $award);
	}

	final public function setCharacter(Person $character): self
	{
		return $this->_set('character', $character);
	}

	final public function setCitation(CreativeWork $citation): self
	{
		return $this->_set('citation', $citation);
	}

	final public function setComment(Comment $comment): self
	{
		return $this->_set('comment', $comment);
	}

	final public function setCommentCount(Int $comment_count): self
	{
		return $this->_set('commentCount', $comment_count);
	}

	final public function setContentLocation(Place $location): self
	{
		return $this->_set('contentLocation', $location);
	}

	final public function setContentRating(String $rating): self
	{
		return $this->_set('contentRating', $rating);
	}

	final public function setContributor(Thing $contributor): self
	{
		if ($contributor instanceof Person or $contributor instanceof Organization) {
			return $this->_set('contributor', $contributor);
		} else {
			throw new \InvalidArgumentException(sprintf(
				'Contributor must be an instance of Person or Organization. Instance of %s given',
				$contributor::getType()
			));
		}
	}

	final public function setCopyRightHolder(Thing $copyright_holder): self
	{
		if ($copyright_holder instanceof Person or $copyright_holder instanceof Organization) {
			return $this->_set('copyrightHolder', $copyright_holder);
		} else {
			throw new \InvalidArgumentException(sprintf(
				'Copyright Holder must be an instance of Person or Organization. Instance of %s given',
				$copyright_holder::getType()
			));
		}
	}

	final public function setCopyrightYear(Int $year): self
	{
		return $this->_set('copyrightYear', $year);
	}

	final public function setCreator(Thing $creator): self
	{
		if ($creator instanceof Person or $creator instanceof Organization) {
			return $this->_set('creator', $creator);
		} else {
			throw new \InvalidArgumentException(sprintf(
				'Creator Holder must be an instance of Person or Organization. Instance of %s given',
				$creator::getType()
			));
		}
	}

	final public function setDateCreated(String $created, Bool $use_time = true): self
	{
		return $this->_set('dateCreated', static::formatDate($created, true, $use_time));
	}

	final public function setDatModified(String $created): self
	{
		return $this->_set('dateModified', static::formatDate($created, true, false));
	}

	final public function setDatePublished(String $created, Bool $use_time = true): self
	{
		return $this->_set('datePublished', static::formatDate($created, true, $use_time));
	}

	final public function setDiscussionUrl(String $discussion_url): self
	{
		if (static::_isURL($discussion_url)) {
			$this->_se('discussionUrl', $discussionUrl);
		} else {
			throw new \InvalidArgumentException("{$discussionUrl} is not a valid URL");
		}
	}

	final public function setEditor(Person $editor): self
	{
		return $this->_set('editor', $editor);
	}

	final public function setEducationalAlignment(AlignmentObject $alignment): self
	{
		return $this->_set('educationalAlignment', $alignment);
	}

	final public function setEducationalUse(String $use): self
	{
		return $this->_set('educationalUse', $use);
	}

	final public function setEncoding(MediaObject $media): self
	{
		return $this->_set('encoding', $media);
	}

	final public function setExampleOfWork(CreativeWork $example): self
	{
		return $this->_set('exampleOfWork', $example);
	}

	final public function setExpires(String $expires): self
	{
		return $this->_set('expires', static::formatDate($expires, true, false));
	}

	final public function setFileFormat(String $format): self
	{
		return $this->_set('fileFormat', $format);
	}

	final public function setFunder(Thing $funder): self
	{
		if ($funder instanceof Person or $funder instanceof Organization) {
			return $this->_set('funder', $funder);
		} else {
			throw new \InvalidArgumentException(sprintf(
				'Funder must be an instance of Person or Organization. Instance of %s given',
				$funder::getType()
			));
		}
	}

	final public function setGenre(String $genre): self
	{
		return $this->_set('genre', $genre);
	}

	final public function setHasPart(CreativeWork $part): self
	{
		return $this->_set('hasPart', $part);
	}

	final public function setHeadline(String $headline): self
	{
		return $this->_set('headline', $headline);
	}

	final public function setLanguage(Language $lang): self
	{
		return $this->_set('language', $lang);
	}

	// final public function setInteractionStatistic(InteractionCounter $service): self
	// {
	// 	return $this->_set('interactionStatistic', $service);
	// }

	final public function setInteractivityType(String $type): self
	{
		return $this->_set('interactivityType', $type);
	}

	final public function setIsAccessibleForFree(Bool $is_free): self
	{
		return $this->_set('isAccessibleForFree', $is_free);
	}

	final public function setIsBasedOn(Thing $based_on): self
	{
		if ($based_on instanceof CreativeWork or $based_on instanceof Product) {
			return $this->_set('isBasedOn', $based_on);
		} else {
			throw new \InvalidArgumentException(sprintf(
				'isBasedOn must be an instance of CreativeWork or Product. %s given',
				$based_on::getType()
			));
		}
	}

	final public function setIsFamilyFriendly(Bool $family_friendly): self
	{
		return $this->_set('isFamilyFriendly', $family_friendly);
	}

	final public function setIsPartOf(CreativeWork $work): self
	{
		return $this->_set('isPartOf', $work);
	}

	final public function setKeywords(String $keywords): self
	{
		return $this->_set('keywords', $keywords);
	}

	final public function setLearningResourceType(String $type): self
	{
		return $this->_set('learningResourceType', $type);
	}

	final public function setLicense(CreativeWork $license): self
	{
		return $this->_set('license', $license);
	}

	final public function setLocationCreated(Place $location): self
	{
		return $this->_set('locationCreated', $location);
	}

	final public function setMainEntity(Thing $entity): self
	{
		return $this->_set('mainEntity', $entity);
	}

	final public function setMaterial(Product $material): self
	{
		return $this->_set('material', $material);
	}

	final public function setMentions(Thing $mentioned): self
	{
		return $this->_set('mentions', $mentioned);
	}

	final public function setOffers(Offer $offered): self
	{
		return $this->_set('offers', $offered);
	}

	final public function setPosition(Int $position): self
	{
		return $this->_set('position', $position);
	}

	final public function setProducer(Thing $producer): self
	{
		if ($producer instanceof Person or $producer instanceof Organization) {
			return $this->_set('producer', $producer);
		} else {
			throw new \InvalidArgumentException(sprintf(
				'Producer must be an instance of Person or Organization. Instance of %s given',
				$producer::getType()
			));
		}
	}

	final public function setProvider(Thing $provider): self
	{
		if ($provider instanceof Person or $provider instanceof Organization) {
			return $this->_set('provider', $provider);
		} else {
			throw new \InvalidArgumentException(sprintf(
				'Provider must be an instance of Person or Organization. Instance of %s given',
				$provider::getType()
			));
		}
	}

	final public function setPublication(PublicationEvent $publication): self
	{
		return $this->_set('publication', $publication);
	}

	final public function setPublisher(Thing $publisher): self
	{
		if ($publisher instanceof Person or $publisher instanceof Organization) {
			return $this->_set('publisher', $publisher);
		} else {
			throw new \InvalidArgumentException(sprintf(
				'Publisher must be an instance of Person or Organization. Instance of %s given',
				$publisher::getType()
			));
		}
	}

	final public function setPublishingPrinciples(CreativeWork $principles): self
	{
		return $this->_set('publisingPrinciples', $principles);
	}

	final public function setRecordedAt(Event $event): self
	{
		return $this->_set('recordedAt', $event);
	}

	final public function setReleasedEvent(PublicationEvent $released): self
	{
		$this->_seet('releasedEvent', $released);
	}

	final public function setReview(Review $review): self
	{
		return $this->_set('review', $review);
	}

	final public function setSchemaVersion(String $version): self
	{
		return $this->_set('schemaVersion', $version);
	}

	final public function setSourceOrganization(Organization $source): self
	{
		return $this->_set('sourceOrganization', $source);
	}

	final public function setSpatialCoverage(Place $covers): self
	{
		return $this->_set('spatialCoverage', $covers);
	}

	final public function setSponsor(Thing $sponsor): self
	{
		if ($sponsor instanceof Person or $sponsor instanceof Organization) {
			return $this->_set('sponsor', $sponsor);
		} else {
			throw new \InvalidArgumentException(sprintf(
				'Sponsor must be an instance of Person or Organization. Instance of %s given',
				$sponsor::getType()
			));
		}
	}

	final public function setTemporalCoverage(String $coverage): self
	{
		return $this->_set('temporalCoverage', $coverage);
	}

	final public function setText(String $text): self
	{
		return $this->_set('text', $text);
	}

	final public function setThumbnailUrl(String $url): self
	{
		if (static::_isURL($url)) {
			return $this->_set('thumbnailUrl', $url);
		} else {
			throw new \InvalidArgumentException("{$url} is not a valid URL");
		}
	}

	final public function setTimeRequired(Duration $duration): self
	{
		return $this->_set('timeRequired', $duration);
	}

	final public function setTranslator(Thing $translator): self
	{
		if ($translator instanceof Person or $translator instanceof Organization) {
			return $this->_set('translator', $translator);
		} else {
			throw new \InvalidArgumentException(sprintf(
				'Translator must be an instance of Person or Organization. Instance of %s given',
				$translator::getType()
			));
		}
	}

	final public function setTypicalAgeRange(String $age_range): self
	{
		return $this->_set('typicalAgeRange', $age_range);
	}

	final public function setVersion(String $version): self
	{
		return $this->_set('version', $version);
	}

	final public function setVideo(VideoObject $video): self
	{
		return $this->_set('video', $video);
	}

	final public function setWorkExample(CreativeWork $example): self
	{
		return $this->_set('workExample', $example);
	}
}
