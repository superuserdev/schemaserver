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

	final public function __construct(Array $data = [])
	{
		if (array_key_exists('@type', $data)) {
			if ($data['@type'] !== static::getType() and false) {
				throw new \Exception("Invalid type: '{$data['@type']}'");
			}
			unset($data['@type'], $data['@context']);

			foreach ($data as $key => $value) {
				if (is_array($value)) {
					if (array_key_exists('@type', $value)) {
						$this->{$key} = static::parseFromArray($value);
					} else {
						throw new \Error('Unable to create object of unknown @type');
					}
				} else {
					$this->{$key} = $value;
				}
			}
		}
	}

	final public static function parseFromArray(Array $data): Thing
	{
		$type = __NAMESPACE__ . '\\' . $data['@type'];
		return new $type($data);
	}

	final public static function parseFromJSON(String $json): Thing
	{
		$data = json_decode($json, true);
		return static::parseFromArray($data);
	}

	final public function parseFromPost(String $key = null): Thing
	{
		return static::parseFromArray(isset($key) ? $_POST[$key] : $_POST);
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
