<?php
namespace SuperUserDev\SchemaServer\Tests\Funcs;

require_once(__DIR__ . DIRECTORY_SEPARATOR . 'consts.php');

use const \SuperUserDev\SchemaServer\Tests\Consts\{
	MIN_PHP_VERSION,
	CREDS,
	DB_TEST,
	EXTS,
	IGNORED_DIRS,
	TZONE,
	CLI_SAPI
};

use \PDO;
use \SuperUserDev\SchemaServer\Thing;
use \DirectoryIterator;
use \Throwable;
use \Exception;
use \ErrorException;
use \InvalidArgumentException;

function exception_handler(Throwable $e): Void
{
	$code = $e->getCode();
	if (is_int($code) and $code > 299 and $code < 600) {
		http_response_code($code);
	} else {
		http_response_code(500);
	}
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
	throw new ErrorException($errstr, $errno, $errno, $errfile, $errline);
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

function gravatar(String $email, Int $size = 80): String
{
	return sprintf(
		'https://gravatar.com/avatar/%s?s=%d',
		md5($email),
		$size
	);
}

function init(): Void
{
	if (version_compare(PHP_VERSION, MIN_PHP_VERSION, '<')) {
		throw new Exception(sprintf('PHP version %s or greater is required', MIN_PHP_VERSION));
	} elseif (in_array(PHP_SAPI, ['cli'])) {
		set_include_path(dirname(__DIR__, 3) . PATH_SEPARATOR . get_include_path());
		spl_autoload_register('spl_autoload');
		spl_autoload_extensions('.php');
		date_default_timezone_set(TZONE);
		set_exception_handler(__NAMESPACE__ . '\\exception_handler');
		set_error_handler(__NAMESPACE__ . '\\error_handler', E_ALL);
	} else {
		throw new Exception('Request is only available through CLI', 400);
	}
}

function get_db_tables(PDO $pdo, $schema = 'public'): Array
{
	$stm = $pdo->prepare('SELECT "table_name" AS "name"
	FROM information_schema.tables
	WHERE table_schema = :schema;');

	$stm->bindValue(':schema', $schema);
	$stm->execute();
	return array_map(function(Array $result): String
	{
		return strtolower($result['name']);
	}, $stm->fetchAll());
}

function get_missing_classes(Array $tables): Array
{
	$base = dirname(__DIR__);
	return array_filter($tables, function(String $table) use ($base): Bool
	{
		return ! file_exists($base . DIRECTORY_SEPARATOR . $table . '.php');
	});
}

function get_missing_tables(Array $tables, $dir = __DIR__): Array
{
	$paths = new DirectoryIterator($dir);
	$missing = [];
	foreach ($paths as $path) {
		if (
			$path->isFile()
			and in_array($path->getExtension(), EXTS)
			and ! in_array($path->getBaseName(".{$path->getExtension()}"), $tables)
		) {
			array_push($missing, $path->getBaseName());
		}
	}
	return $missing;
}

function connect(String $creds_file = CREDS): PDO
{
	static $pdo = null;
	if (! isset($pdo)) {
		if (file_exists($creds_file)) {
			$creds = $creds = json_decode(file_get_contents(CREDS));
			$pdo = Thing::connect($creds->user, $creds->pass ?? '', $creds->dbname ?? $creds->user);
		} else {
			$pdo = Thing::connect('postgres', '', 'schema');
		}
	}
	return $pdo;
}
