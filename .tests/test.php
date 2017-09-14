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
namespace SuperUserDev\SchemaServer\Tests\Test;

require_once(__DIR__ . DIRECTORY_SEPARATOR . 'funcs.php');

use const \SuperUserDev\SchemaServer\Tests\Consts\{
	CREDS,
	DB_TEST
};

use function \SuperUserDev\SchemaServer\Tests\Funcs\{
	init,
	gravatar,
	connect
};


use \SuperUserDev\SchemaServer\{
	Thing,
	Person,
	ImageObject,
	PostalAddress,
	Organization,
	Event,
	Place
};
use \PDO;
use \Throwable;
use \Exception;
use \ErrorException;

init();
header('Content-Type: ' . Thing::CONTENT_TYPE);

if (DB_TEST and file_exists(CREDS)) {
	exit(Person::get('029e7b946abd6cff214286dff43a7632', connect()));
}

if (empty($_POST)) {
	if (array_key_exists('id', $_GET) and file_exists(CREDS)) {
		exit(Event::get($_GET['id'], connect(), [], true));
	}

	$me                 = new Person();
	$me->givenName      ='Christopher';
	$me->additionalName = 'Wayne';
	$me->familyName     = 'Zuber';
	$me->email          = 'chris@chriszuber.com';
	$me->url            = 'https://chriszuber.com';
	$me->sameAs         = 'https://twitter.com/shgysk8zer0';
	$me->image          = new ImageObject([
		'@type' => 'ImageObject',
		'width' => 128,
		'height' => 128,
		'url' => gravatar($me->email, 128),
	]);
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
	$event->image = new ImageObject([
		'@type'  => 'ImageObject',
		'width'  => 1920,
		'height' => 1157,
		'url'    => 'http://i.imgur.com/doiqeSd.png',
	]);
	$event->organizer = $me->worksFor;
	$event->calcDuration();

	if (DB_TEST and file_exists(CREDS)) {
		$event->save($pdo);
		exit($event);
	} else {
		exit(json_encode($event, JSON_PRETTY_PRINT));
	}
} else {
	$thing = Thing::parseFromPost();
	exit($thing);
}
