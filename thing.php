<?php

namespace shgysk8zer0\SchemaServer;

use \shgysk8zer0\SchemaServer\Traits\{Iterator, Magic, Serial, Data, Filters};

class Thing implements \JsonSerializable, \Serializable, \Iterator
{
	use Data;
	Use Magic;
	use Serial;
	use Iterator;
	use Filters;

	const CONTEXT = 'http://schema.org';

	protected $_data = [];

	final public function __construct(\stdClass $data = null)
	{
		if (isset($data)) {
			if ($data->{"@type"} !== static::getType()) {
				throw new \Exception("Invalid type: '{$data->{"@type"}}'");
			}
			unset($data->{"@type"}, $data->{"@context"});

			foreach (get_object_vars($data) as $key => $value) {
				if (is_object($value)) {
					if (isset($value->{"@type"})) {
						$type = __NAMESPACE__ . '\\' . $value->{"@type"};
						$this->{$key} = new $type($value);
					} else {
						throw new \Error("Unable to create object of unknown @type");
					}
				} else {
					$this->{$key} = $value;
				}
			}
		}
	}

	final public function setAdditionalType(String $url)
	{
		if (static::_isURL($url)) {
			$this->_set('additionalType', $url);
		}
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
		if (static::_isURL($url)) {
			$this->_set('sameAs', $url);
		} else {
			throw new \InvalidArgumentException("'{$url}' is not a valid url");
		}
	}

	final public function setUrl(String $url)
	{
		if (static::_isURL($url)) {
			$this->_set('url', $url);
		} else {
			throw new \InvalidArgumentException("'{$url}' is not a valid url");
		}
	}
}
