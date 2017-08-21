<?php

namespace shgysk8zer0\SchemaServer;

class CreativeWork extends Thing
{
	final public function setAuthor(Person $author)
	{
		$this->_set('author', $author);
	}
}
