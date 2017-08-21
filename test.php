<?php

namespace shgysk8zer0\SchemaServer;

if (in_array(PHP_SAPI, ['cli', 'cli-server'])) {
	header('Content-Type: application/json');
	set_include_path(dirname(__DIR__, 2));
	spl_autoload_register('spl_autoload');

	set_exception_handler(function(\Throwable $e)
	{
		echo json_encode([
			'message' => $e->getMessage(),
			'line'    => $e->getLine(),
			'file'    => $e->getFile(),
		], JSON_PRETTY_PRINT);
	});

	$me = new Person();
	$me->givenName ='Christopher';
	$me->additionalName = 'Wayne';
	$me->familyName = 'Zuber';
	$me->image = new ImageObject();
	$me->image->width = 128;
	$me->image->height = 128;
	$me->email = 'chris@chriszuber.com';
	$me->url = 'https://chriszuber.com';
	$me->image->url = sprintf(
		'https://gravatar.com/avatar/%s?s=%d',
		md5($me->email),
		$me->image->width
	);
	$me->address = new PostalAddress([
		'@type'           => 'PostalAddress',
		'addressLocality' => 'Mount Vernon',
		'addressRegion'   => 'WA',
		'postalCode'      => 98274,
	]);
	$me->name = "{$me->givenName} {$me->additionalName} {$me->familyName}";
	$me->image->caption = "{$me->name} (Gravatar)";

	echo json_encode($me, JSON_PRETTY_PRINT) . PHP_EOL;

	echo print_r(get_included_files()) . PHP_EOL;
}
