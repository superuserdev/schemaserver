<?php

namespace shgysk8zer0\SchemaServer\Traits;

trait Magic
{
	final public function __isset(String $prop): Bool
	{
		return array_key_exists($prop, $this->_data);
	}

	final public function __unset(String $prop): Void
	{
		unset($this->_data[$prop]);
	}

	final public function __set(String $prop, $value): Void
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

	final public function __debugInfo(): Array
	{
		return $this->_data;
	}

	final public function __toString(): String
	{
		return json_encode($this);
	}
}
