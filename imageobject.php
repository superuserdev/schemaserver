<?php

namespace shgysk8zer0\SchemaServer;

class ImageObject extends MediaObject
{
	final public function setCaption(String $caption)
	{
		$this->_set('caption', $caption);
	}

	final public function setThumbnail(ImageObject $thumbnail)
	{
		$this->_set('thumbnail', $thumbnail);
	}
}
