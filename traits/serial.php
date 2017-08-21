<?php

namespace shgysk8zer0\SchemaServer\Traits;

trait Serial
{
	final public function serialize(): String
	{
		return serialize($this->_data);
	}

	final public function unserialize($data): Void
	{
		$this->_data = unserialize($data);
	}

	final public function jsonSerialize(): Array
	{
		return array_merge(static::getInfo(), $this->_data);
	}
}
