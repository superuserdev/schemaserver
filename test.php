<?php
/**
 * @author Chris Zuber <chris@chriszuber.com>
 * @package superuserdev/schemaserver
 * @copyright 2017
 * @license https://opensource.org/licenses/LGPL-3.0 GNU Lesser General Public License version 3
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 3.0 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library.
 */
namespace SuperUserDev\SchemaServer;

const CREDS           = __DIR__ . DIRECTORY_SEPARATOR . 'creds.json';
const MIN_PHP_VERSION = '7.1';
const DB_TEST         = true;
if (version_compare(PHP_VERSION, MIN_PHP_VERSION, '<')) {
	throw new \Exception(sprintf('PHP version %s or greater is required', MIN_PHP_VERSION));
} elseif (in_array(PHP_SAPI, ['cli', 'cli-server'])) {

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

	function gravatar(String $email, Int $size = 80): String
	{
		return sprintf(
			'https://gravatar.com/avatar/%s?s=%d',
			md5($email),
			$size
		);
	}

	set_include_path(dirname(__DIR__, 2) . PATH_SEPARATOR . get_include_path());
	spl_autoload_register();
	spl_autoload_extensions('.php');
	header('Content-Type: ' . Thing::CONTENT_TYPE);
	date_default_timezone_set('America/Los_Angeles');
	set_exception_handler(__NAMESPACE__ . '\exception_handler');
	set_error_handler(__NAMESPACE__ . '\error_handler', E_ALL);

	if (file_exists(CREDS)) {
		$creds = $creds = json_decode(file_get_contents(CREDS));
		$pdo = Thing::connect($creds->user, $creds->pass ?? '', $creds->dbname ?? $creds->user);
		exit(Person::get('029e7b946abd6cff214286dff43a7632', $pdo));
	}

	if (empty($_POST)) {
		if (array_key_exists('id', $_GET) and file_exists(CREDS)) {
			exit(Event::get($_GET['id'], $pdo, [], true));
		}

		$me                 = new Person();
		$me->givenName      ='Christopher';
		$me->additionalName = 'Wayne';
		$me->familyName     = 'Zuber';
		$me->image          = new ImageObject();
		$me->image->width   = 128;
		$me->image->height  = 128;
		$me->email          = 'chris@chriszuber.com';
		$me->url            = 'https://chriszuber.com';
		$me->sameAs         = 'https://twitter.com/shgysk8zer0';
		$me->image->url     = gravatar($me->email, $me->image->width);
		$me->address        = new PostalAddress([
			'@type'           => 'PostalAddress',
			'addressLocality' => 'Mount Vernon',
			'addressRegion'   => 'WA',
			'postalCode'      => 98274,
		]);
		$me->birthDate = 'March 26, 1985';
		$me->jobTitle = 'Full Stack Web Developer (LAMP)';
		$me->worksFor = new Organization([
			'@type' => 'Organization',
			'name'  => 'Super User Dev',
			'url'   => 'https://github.com/SuperUserDev',
			'logo'  => [
				'@type' => 'ImageObject',
				'url'   => 'https://chriszuber.com/favicon.svg',
			]
		]);
		$me->name = "{$me->givenName} {$me->additionalName} {$me->familyName}";
		$me->image->caption = "{$me->name} (Gravatar)";
		$event = new Event();
		$event->name = "Birthday party for {$me->name}";
		$event->description = 'Punch & pie';
		$event->about = $me;
		$event->location = new Place();
		$event->location->name = 'Home';
		$event->startDate = '2018-03-26T16:00:00-07:00';
		$event->endDate = '2018-03-26T20:00:00-07:00';
		$event->location->address = $me->address;
		$event->image = new ImageObject();
		$event->image->url = 'http://i.imgur.com/doiqeSd.png';
		$event->image->width = 1920;
		$event->image->height = 1157;
		$event->organizer = $me->worksFor;
		$event->calcDuration();

		if (DB_TEST and file_exists(CREDS)) {
			$event->save($pdo);
			exit($event);
		} else {
			exit($event);
		}
	} else {
		$thing = Thing::parseFromPost();
		exit($thing);
	}
}
