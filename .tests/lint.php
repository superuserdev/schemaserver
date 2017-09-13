<?php

namespace SuperUserDev\SchemaServer\Tests;
require_once(__DIR__ . DIRECTORY_SEPARATOR . 'consts.php');

use const \SuperUserDev\SchemaServer\Tests\{
	MIN_PHP_VERSION,
	CREDS,
	DB_TEST,
	EXTS,
	IGNORED_DIRS,
	TZONE
};
use \PDO;
use \SuperUserDev\SchemaServer\Thing;
use \DirectoryIterator;
use \Throwable;
use \Exception;
use \ErrorException;

if (version_compare(PHP_VERSION, MIN_PHP_VERSION, '<')) {
	throw new \Exception(sprintf('PHP version %s or greater is required', MIN_PHP_VERSION));
} elseif (in_array(PHP_SAPI, ['cli'])) {

	function exception_handler(\Throwable $e): Void
	{
		http_response_code(500);
		echo json_encode([
			'message' => $e->getMessage(),
			'line'    => $e->getLine(),
			'file'    => $e->getFile(),
			'trace'   => $e->getTrace(),
		], JSON_PRETTY_PRINT);
	}

	function error_handler(
		Int $errno,
		String $errstr,
		String $errfile,
		Int $errline
	): Void
	{
		throw new \ErrorException($errstr, $errno, $errno, $errfile, $errline);
	}

	function lint_dir(String $dir = __DIR__): Bool
	{
		$paths = new DirectoryIterator($dir);
		$valid  = true;
		foreach ($paths as $path) {
			if (
				$path->isDir()
				and ! $path->isDot()
				and ! in_array($path, IGNORED_DIRS)
				and ! call_user_func(__FUNCTION__, $path->getPathname())
			) {
				$valid = false;
				break;
			} elseif (
				$path->isFile()
				and in_array($path->getExtension(), EXTS)
			) {
				if (! lint_file($path->getPathname())) {
					$valid = false;
					break;
				} elseif (dirname($path->getPathname()) === dirname(__DIR__) and ! valid_class($path)) {
					throw new Exception("{$path->getBaseName()} does not contain a valid class");
				}
			}
		}
		return $valid;
	}

	function lint_file(String $path): Bool
	{
		$path = escapeshellarg($path);
		$msg = exec("php -l {$path}", $arr, $return_var);
		if ($return_var !== 0) {
			throw new Exception($msg);
		} else {
			return true;
		}
	}

	function valid_class(DirectoryIterator $path, Array $tables = []): Bool
	{
		$ext = ".{$path->getExtension()}";
		$fname = $path->getBaseName($ext);
		$class = "\\SuperUserDev\\SchemaServer\\{$fname}";
		return class_exists($class);
	}

	set_include_path(dirname(__DIR__, 3) . PATH_SEPARATOR . get_include_path());
	spl_autoload_register('spl_autoload');
	spl_autoload_extensions('.php');
	header('Content-Type: ' . Thing::CONTENT_TYPE);
	date_default_timezone_set(TZONE);
	set_exception_handler(__NAMESPACE__ . '\exception_handler');
	set_error_handler(__NAMESPACE__ . '\error_handler', E_ALL);

	lint_dir(dirname(__DIR__));
} else {
	http_response_code(400);
}
