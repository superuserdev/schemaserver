<?php
namespace shgysk8zer0\SchemaServer;

if (PHP_SAPI === 'cli') {
	set_exception_handler(function(\Throwable $e)
	{
		echo json_encode([
			'message' => $e->getMessage(),
			'line'    => $e->getLine(),
			'file'    => $e->getFile(),
		], JSON_PRETTY_PRINT);
	});
	set_include_path(dirname(__DIR__, 2));
	spl_autoload_register('spl_autoload');

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
	$me->image->caption = "{$me->givenName} {$me->familyName} (Gravatar)";

	print_r(new Person(json_decode(json_encode($me))));
	exit;

	echo json_encode($me, JSON_PRETTY_PRINT) . PHP_EOL;

	// echo json_encode($me, JSON_PRETTY_PRINT) . PHP_EOL;
}
