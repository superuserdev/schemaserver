<?php

const EXTS = ['php'];
const IGNORED_DIRS = ['.git'];

if (PHP_SAPI === 'cli') {
	/**
	 * @param  String $dir The directory to lint
	 * @return Bool        Whether or not linting all PHP scripts was successful
	 */
	function lint_dir(String $dir = __DIR__): Bool
	{
		$paths = new \DirectoryIterator($dir);
		$valid  = true;
		foreach ($paths as $path) {
			if (
				$path->isDir()
				and !$path->isDot()
				and ! in_array($path, IGNORED_DIRS)
				and !call_user_func(__FUNCTION__, $path->getPathname())
			) {
				$valid = false;
				break;
			} elseif (
				$path->isFile()
				and in_array($path->getExtension(), EXTS)
				and ! lint_file($path->getPathname())
			) {
				$valid = false;
				break;
			}
		}
		return $valid;
	}

	/**
	 * @param  String $path  The file to lint
	 * @return Bool          If script passed linting test
	 */
	function lint_file(String $path): Bool
	{
		$path = escapeshellarg($path);
		$msg = exec("php -l {$path}", $arr, $return_var);
		if ($return_var !== 0) {
			echo $msg . PHP_EOL;
			return false;
		} else {
			return true;
		}
	}
	exit(lint_dir(__DIR__) ? 0 : 1);
} else {
	http_response_code(400);
}
