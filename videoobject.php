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
 * @see https://schema.org/VideoObject
 */
class VideoObject extends MediaObject
{
	final public function setActor(Thing $actor): self
	{
		if ($actor instanceof Person or $actor instanceof Organization) {
			return $this->_set('actor', $actor);
		} else {
			throw new \InvalidArgumentException(sprintf(
				'Author must be an instance of Person or Organization. Instance of %s given',
				$actor::getType()
			));
		}
	}

	final public function setCaption(String $caption): self
	{
		return $this->_set('caption', $caption);
	}

	final public function setDirector(Person $director): self
	{
		return $this->_set('director', $director);
	}

	final public function setThumbnail(ImageObject $thumbnail): self
	{
		return $this->_set('thumbnail', $thumbnail);
	}

	final public function setTranscript(String $transcript): self
	{
		return $this->_set('transcript', $transcript);
	}

	final public function setVideoFrameSize(String $size): self
	{
		return $this->_set('videoFrameSize', $size);
	}

	final public function setVideoQuality(String $quality): self
	{
		return $this->_set('videoQuality', $quality);
	}
}
