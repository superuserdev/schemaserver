<?php

namespace shgysk8zer0\SchemaServer\Traits;

trait Data
{
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
