<?php

namespace shgysk8zer0\SchemaServer;

class MediaObject extends CreativeWork
{
	final public function setWidth(Int $width)
	{
		$this->_set('width', $width);
	}

	final public function setHeight(Int $height)
	{
		$this->_set('height', $height);
	}

	final public function setUploadDate(\DateTime $date)
	{
		$this->_set('uploadDate', $date);
	}
}
