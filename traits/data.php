<?php

namespace shgysk8zer0\SchemaServer\Traits;

trait Data
{
	private $_data = [];

	final public function __isset(String $prop): Bool
	{
		return array_key_exists($prop, $this->_data);
	}

	final public function __unset(String $prop)
	{
		unset($this->_data[$prop]);
	}

	final public function __set(String $prop, $value)
	{
		$method = ucfirst($prop);

		if (method_exists($this, "set{$method}")) {
			call_user_func([$this, "set{$method}"], $value);
		}
	}

	final public function __get(String $prop)
	{
		if (isset($this->$prop)) {
			return $this->_data[$prop];
		} else {
			throw new Error("Invalid property, {$prop}.");
		}
	}

	final public function jsonSerialize(): Array
	{
		return array_merge(static::getInfo(), $this->_data);
	}

	final protected function _set(String $prop, $value)
	{
		$this->_data[$prop] = $value;
	}

	final public static function getType(): String
	{
		return @end(explode('\\', static::class));
	}

	final public static function getInfo(): Array
	{
		return [
			'@type' => static::getType(),
			'@context' => static::CONTEXT,
		];
	}
}
