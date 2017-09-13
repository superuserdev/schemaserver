<?php

namespace SuperUserDev\SchemaServer\Tests;
require_once(__DIR__ . DIRECTORY_SEPARATOR . 'funcs.php');

use const \SuperUserDev\SchemaServer\Tests\Consts\{
	CREDS,
	DB_TEST
};

use function \SuperUserDev\SchemaServer\Tests\Funcs\{
	lint_dir,
	init
};

use \SuperUserDev\SchemaServer\{
	Thing
};
use \PDO;
use \DirectoryIterator;
use \Throwable;
use \Exception;
use \ErrorException;


init();
lint_dir(dirname(__DIR__));
