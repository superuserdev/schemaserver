<?php
/**
 * @author Chris Zuber <chris@chriszuber.com>
 * @package shgysk8zer0/schemaserver
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
namespace shgysk8zer0\SchemaServer;

if (in_array(PHP_SAPI, ['cli', 'cli-server'])) {
	set_include_path(dirname(__DIR__, 2) . PATH_SEPARATOR . get_include_path());
	spl_autoload_register();
	spl_autoload_extensions('.php');
	header('Content-Type: ' . Thing::CONTENT_TYPE);

	function exception_handler(\Throwable $e): Bool
	{
		echo json_encode([
			'message' => $e->getMessage(),
			'line'    => $e->getLine(),
			'file'    => $e->getFile(),
			'trace'   => $e->getTrace(),
		], JSON_PRETTY_PRINT);
		return true;
	}

	function gravatar(String $email, Int $size = 80): String
	{
		return sprintf(
			'https://gravatar.com/avatar/%s?s=%d',
			md5($email),
			$size
		);
	}

	set_exception_handler(__NAMESPACE__ . '\exception_handler');

	$me = new Person();
	$me->givenName ='Christopher';
	$me->additionalName = 'Wayne';
	$me->familyName = 'Zuber';
	$me->image = new ImageObject();
	$me->image->width = 128;
	$me->image->height = 128;
	$me->email = 'chris@chriszuber.com';
	$me->url = 'https://chriszuber.com';
	$me->sameAs = 'https://twitter.com/shgysk8zer0';
	$me->image->url = gravatar($me->email, $me->image->width);
	$me->address = new PostalAddress([
		'@type'           => 'PostalAddress',
		'addressLocality' => 'Mount Vernon',
		'addressRegion'   => 'WA',
		'postalCode'      => 98274,
	]);
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

	echo json_encode($me, JSON_PRETTY_PRINT) . PHP_EOL;
}
