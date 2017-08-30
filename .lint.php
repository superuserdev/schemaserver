<?php

const EXTS = ['php'];
const IGNORED_DIRS = ['.git'];

if (PHP_SAPI === 'cli') {
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

	function lint_file(String $path): Bool
	{
		$path = escapeshellarg($path);
		$msg = exec("php -l {$path}", $arr, $return_var);
		if ($return_var !== 0) {
			throw new \Exception($msg);
		} else {
			return true;
		}
	}
	lint_dir(__DIR__);
}
