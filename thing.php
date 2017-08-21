<?php

namespace shgysk8zer0\SchemaServer;

use \shgysk8zer0\SchemaServer\Traits\{Iterator, Magic, Serial, Data};

class Thing implements \JsonSerializable, \Serializable, \Iterator
{
	use Data;
	Use Magic;
	use Serial;
	use Iterator;

	const CONTEXT = 'http://schema.org';

	protected $_data = [];

	final public function setAdditionalType(String $url)
	{
		$this->_set('additionalType', $url);
	}

	final public function setAlternateName(String $name)
	{
		$this->_set('alternamteName', $name);
	}

	final public function setDescription(String $description)
	{
		$this->_set('description', $description);
	}

	final public function setImage(ImageObject $image)
	{
		$this->_set('image', $image);
	}

	final public function setName(String $name)
	{
		$this->_set('name', $name);
	}

	final public function setSameAs(String $url)
	{
		$this->_set('sameAs', $url);
	}

	final public function setUrl(String $url)
	{
		$this->_set('url', $url);
	}
}
