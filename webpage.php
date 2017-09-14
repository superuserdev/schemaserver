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
 * @see https://schema.org/WebPage
 */
class WebPage extends CreativeWork
{
	final public function setBreadcrumb(BreadcrumbList $breadcrumbs): self
	{
		return $this->_set('breadcrumb', $breadcrumbs);
	}

	final public function setLastReviewed(String $date): self
	{
		return $this->_set('lastReviewed', static::formatDate($date, true, false));
	}

	final public function setMainContentOfPage(WebPageElement $element): self
	{
		return $this->_set('mainContentOfPage', $element);
	}

	final public function setPrimaryImageOfPage(ImageObject $image): self
	{
		return $this->_set('primaryImageOfPage', $image);
	}

	final public function setRelatedLink(String $url): self
	{
		if (static::_isURL($url)) {
			return $this->_set('relatedLink', $url);
		} else {
			throw new \InvalidArgumentException("{$url} is not a valid URL");
		}
	}

	final public function setReviewedBy(Thing $reviewer): self
	{
		if ($reviewer instanceof Person or $reviewer instanceof Organization) {
			return $this->_set('reviewedBy', $reviewer);
		} else {
			throw new \InvalidArgumentException(sprintf(
				'Reviewer must be an instance of Person or Organization. Instance of %s given',
				$reviewer::getType()
			));
		}
	}

	final public function setSignificantLink(String $url): self
	{
		if (static::_isURL($url)) {
			return $this->_set('significantLink', $url);
		} else {
			throw new \InvalidArgumentException("{$url} is not a valid URL");
		}
	}

	final public function setSpecialty(Specialty $specialty): self
	{
		return $this->_set('specialty', $specialty);
	}
}
