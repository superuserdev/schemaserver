<?php

namespace shgysk8zer0\SchemaServer\Traits;

trait Iterator
{
	private $_iterator = 0;

	private $_keys = [];

	final public function current()
	{
		return $this->{$this->key()};
	}

	final public function key(): String
	{
		return $this->_keys[$this->_iterator];
	}

	final public function next(): Void
	{
		$this->_iterator++;
	}

	final public function rewind(): Void
	{
		$this->_iterator = 0;
		$this->_keys = array_keys($this->_data);
	}

	final public function valid(): Bool
	{
		return $this->_iterator < count($this->_keys);
	}
}
