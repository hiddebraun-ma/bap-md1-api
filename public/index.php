<?php
require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../private/functions.php';
require __DIR__ . '/../private/controllers.php';

$CONFIG = require __DIR__ . '/../private/config.php';

// Zet de juiste BASE URL in config.php (dus wat is het pad naar de public folder)
$router = new AltoRouter( [], $CONFIG['BASE_URL'] );

$router->map( 'GET', '/', 'homepage');
$router->map( 'GET', '/voorbeeld', 'voorbeeld' );
$router->map( 'GET', '/voorbeeld/zoeken', 'voorbeeld_zoeken');

if ( $match = $router->match() ) {
	$controller_function = $match['target'];
	if ( function_exists( $controller_function ) ) {
		$controller_function();
		exit;
	} else {
		echo "Maak een function aan voor deze route in de controllers.php file: " . $controller_function, '()';
	}
} else {
	page_404();
}





