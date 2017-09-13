<?php

namespace SuperUserDev\SchemaServer\Tests;
require_once(__DIR__ . DIRECTORY_SEPARATOR . 'funcs.php');

use const \SuperUserDev\SchemaServer\Tests\Consts\{
	CREDS,
	DB_TEST
};

use function \SuperUserDev\SchemaServer\Tests\Funcs\{
	lint_dir,
	init,
	connect,
	get_db_tables,
	get_missing_classes,
	get_missing_tables
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

$tables = get_db_tables(connect());
$missing_tables = get_missing_tables($tables, dirname(__DIR__));

if (! empty($missing_tables)) {
	throw new Exception(sprintf('Missing database tables for [%s]', join(', ', $missing_tables)));
}
unset($missing_tables);
$missing_files = get_missing_classes($tables);
unset($tables);

if (! empty($missing_files)) {
	throw new Exception(sprintf('Missing PHP classes for [%s]', join(', ', $missing_files)));
}
