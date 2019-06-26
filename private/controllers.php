<?php

function page_404()
{
    view('404');
}


function homepage()
{
    view('homepage');
}

function voorbeeld()
{
    view('voorbeeld');
}

function voorbeeld_zoeken()
{
    global $CONFIG;

    $postcode = filter_var($_GET['postcode'], FILTER_SANITIZE_STRING);
    $huisnummer = filter_var($_GET['huisnummer'], FILTER_SANITIZE_STRING);

    // IN het config.php heb ik al de basis url ingesteld, deze gebruik ik, en ik plak hier de juiste service en parameters achter
    $url = $CONFIG['API_ENDPOINT'] . '?postcode=' . $postcode . '&number=' . urlencode($huisnummer);

    //Als mijn zoekdopracht "Avengers" is, wordt de url dus: https://omdbapi.com/apikey=

    // Hier maak ik een HTTP Client aan, deze is automatisch ingeladen
    // Documentatie  hoe je deze aanroept: http://docs.guzzlephp.org/en/stable/quickstart.html
    $client = new GuzzleHttp\Client();
    $response = $client->request('GET', $url,
        [
            'headers' => [
                'Accept' => 'application/json',
                'X-Api-Key' => $CONFIG['API_KEY']
            ]
        ]
    );

    $data = json_decode($response->getBody()->getContents(), true);

    view('voorbeeld', ['data' => $data]);

}