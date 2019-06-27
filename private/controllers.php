<?php

function page_404() {
	view( '404' );
}


function homepage() {
	view( 'homepage' );
}

function voorbeeld() {
	view( 'voorbeeld' );
}

function voorbeeld_zoeken() {
	global $CONFIG;

	$zoekopdracht = filter_var( $_GET['zoekopdracht'], FILTER_SANITIZE_STRING );

	// IN het config.php heb ik al de basis url ingesteld, deze gebruik ik, en ik plak hier de juiste service en parameters achter
	$url          = $CONFIG['API_ENDPOINT'] . '/?apikey='.$CONFIG['API_KEY'].'&s=' . urlencode($zoekopdracht);

	//Als mijn zoekdopracht "Avengers" is, wordt de url dus: https://omdbapi.com/?apikey=d28c89b3&s=Avengers

	// Hier maak ik een HTTP Client aan, deze is automatisch ingeladen in dit project
	// Hier lees je meer over hoe je deze HTTP Client kunt gebruiken:  http://docs.guzzlephp.org/en/stable/quickstart.html

	$client   = new GuzzleHttp\Client();
	$response = $client->request( 'GET', $url,
		[
			'headers' => [
				'Accept'       => 'application/json',
				'Content-type' => 'application/json'
			]
		]
	);

	//De JSON zetten we hier om naar een array!
	$data = json_decode( $response->getBody()->getContents(), true );

	// Hier laden we de view en geven we de data mee aan de view
    // De view is in dit geval: private/views/voorbeeld.php

	view('voorbeeld', ['data' => $data]);

}