<?php

namespace shgysk8zer0\SchemaServer;

class Person extends Thing
{
	final public function setAdditionalName(String $name)
	{
		$this->_set('additionalName', $name);
	}

	final public function setFamilyName(String $name)
	{
		$this->_set('familyName', $name);
	}

	final public function setGivenName(String $name)
	{
		$this->_set('givenName', $name);
	}
}
