<?php

namespace shgysk8zer0\SchemaServer\Traits;

trait Filters
{
	final protected static function _isEmail(String $text): Bool
	{
		return filter_var($text, FILTER_VALIDATE_EMAIL);
	}

	final protected static function _isURL(String $text): Bool
	{
		return filter_var($text, FILTER_VALIDATE_URL);
	}
}
