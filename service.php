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
 * @see https://schema.org/Service
 */
class Service extends Intangible
{
	final public function setAggregateRating(AggregateRating $rating): self
	{
		return $this->_set('aggregateRating', $rating);
	}

	final public function setAreaServed(Thing $area): self
	{
		if ($area instanceof Place or $area instanceof GeoShape) {
			return $this->_set('areaServed', $area);
		} else {
			throw new \InvalidArgumentException(sprintf(
				'AreaServed must be an instance of Place or GeoShape. Instance of %s given',
				$area::getType()
			));
		}
	}

	// final public function setAvailableChannel(ServiceChannel $channel)
	// {
	// 	return $this->_set('availableChannel', $channel);
	// }

	final public function setAward(String $award): self
	{
		return $this->_set('award', $award);
	}

	final public function setBrand(Thing $brand): self
	{
		if ($brand instanceof Brand or $brand instanceof Organization) {
			return $this->_set('brand', $brand);
		} else {
			throw new \InvalidArgumentException(sprintf(
				'Brand must be an instance of Brand or Organization. Instance of %s given',
				$brand::getType()
			));
		}
	}

	final public function setBroker(Thing $broker): self
	{
		if ($broker instanceof Person or $broker instanceof Organization) {
			return $this->_set('broker', $broker);
		} else {
			throw new \InvalidArgumentException(sprintf(
				'Broker must be an instance of Person or Organization. Instance of %s given',
				$broker::getType()
			));
		}
	}

	final public function setCategory(Thing $category): self
	{
		return $this->_set('category', $category);
	}

	final public function setHasOfferCatelog(OfferCatelog $catelog): self
	{
		return $this->_set('hasOfferCatelog', $catelog);
	}

	final public function setHoursAvailable(OpeningHoursSpecification $hours): self
	{
		return $this->_set('hoursAvailable', $hours);
	}

	final public function setIsRelatedTo(Thing $related_to): self
	{
		if ($related_to instanceof Product or $related_to instanceof Service)
		{
			return $this->_set('isRelatedTo', $related_to);
		} else {
			throw new \InvalidArgumentException(sprintf(
				'Related to must be an instance of Product or Service. Instance of %s given',
				$related_to::getType()
			));
		}
	}

	final public function setIsSimilarTo(Thing $similar_to): self
	{
		if ($similar_to instanceof Product or $similar_to instanceof Service)
		{
			return $this->_set('isSimilarTo', $similar_to);
		} else {
			throw new \InvalidArgumentException(sprintf(
				'Similar to must be an instance of Product or Service. Instance of %s given',
				$similar_to::getType()
			));
		}
	}

	final public function setLogo(ImageObject $logo): self
	{
		return $this->_set('logo', $logo);
	}

	// final public function setOffers(Offer $offer)
	// {
	// 	return $this->_set('offer', $offer);
	// }

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

	final public function setProviderMobility(String $mobility): self
	{
		return $this->_set('providerMobility', $mobility);
	}

	final public function setReview(Review $review): self
	{
		return $this->_set('review', $review);
	}

	final public function setServiceOutput(Thing $output): self
	{
		return $this->_set('serviceOutput', $output);
	}

	final public function setServiceType(String $type): self
	{
		return $this->_set('serviceType', $type);
	}
}
