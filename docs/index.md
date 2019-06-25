# Een API aanroepen en gegevens gebruiken op je website

We gaan spelen met het aanroepen van een API (Application Programming Interface) 
Er zijn heel veel API's die je kunt gebruiken. Denk aan:
- Postcode / Geolocatie API
- Weersvoorspelling opvragen
- Gegevens over films opzoeken
- Facebook API / Instagram API etc. etc. (lastiger)

Kijk eens op https://any-api.com voor een overzicht van allerlei API's.

Je kunt een API aanroepen met PHP (of een andere script taal) en vaak ook met Javascript.
Om met PHP een API aan te roepen moet je aan HTTP Client gebruiken.
Dit is een soort browser maar dan zonder grafische weergave, je krijgt *rauwe* data terug, meestal in JSON.

In dit project maak ik gebruik van Guzzle, dit is een open source Http Client die je kunt gebruiken.

Je stelt de client in:
- Welke API en URL wil je opvragen
- Stel de juiste parameters in
- Roep de API aan en lees het resultaat uit.

Het voorbeeld maakt gebruik van een Movie API waar je kunt zoeken naar Films.
Hiervoor heb ik formulier met een zoekveld gemaakt. Als je die opstuurt lees ik de juiste parameter uit en gebruik ik die om de API aan te roepen.

Hiervoor heb ik eerst de documentatie gelezen van de API. In dit geval: http://omdbapi.com/

Je kunt zoeken op ID, Title of een vrije zoekopdracht.
De URL hiervoor is:

http://www.omdbapi.com/?apikey=[apikey]&s=[zoekopdracht]

De API key heb ik aangevraagd (gratis) dat is `d28c89b3`
Als ik zoek naar 'Avengers' wordt de URL dus:

http://www.omdbapi.com/?apikey=d28c89b3&s=Avengers

Die roep ik aan, en dan krijg ik JSON terug die ik volgens het MVC principe (ja ja, daar is ie weer)aan de view geef.
Daar hoef ik er alleen maar mooie HTML van te maken.

De JSON die je terugkrijgt ziet er zo uit:

```json
 {
    "Search": 
    [
        {
            "Title": "The Avengers",
            "Year": "2012",
            "imdbID": "tt0848228",
            "Type": "movie",
            "Poster": "https://m.media-amazon.com/images/M/MV5BNDYxNjQyMjAtNTdiOS00NGYwLWFmNTAtNThmYjU5ZGI2YTI1XkEyXkFqcGdeQXVyMTMxODk2OTU@._V1_SX300.jpg"
        },
        {
            "Title": "Avengers: Infinity War",
            "Year": "2018",
            "imdbID": "tt4154756",
            "Type": "movie",
            "Poster": "https://m.media-amazon.com/images/M/MV5BMjMxNjY2MDU1OV5BMl5BanBnXkFtZTgwNzY1MTUwNTM@._V1_SX300.jpg"
        }
  ]
}

```

Met de de functie [json_decode()](https://www.php.net/manual/en/function.json-decode.php) kan ik dit omzetten naar een array in PHP.

---

Kijk of je de code snapt en kies nu zelf een API die je wilt gebruiken.
Kies een API die gratis is en die gebruik maakt van een API key (er zijn ook ingewikkelde manieren, zoals OAuth, die zou ik even overslaan nog)

---

### Suggesties

#### Postcode API

https://postcode-api.nu  
API Key: `Ps06isU9I15LHZZHHjbRw7InmtQAyOp7apkCYCUi`

Maak een form met postcode en huisnummer en vul straat, huisnummer en plaats automatisch in.
Kan ook met Javascript en AJAX....

---

#### Openweather Api

https://openweathermap.org/api

Registreer je, lees de documentatie en doe een request naar de API.
Laat het weerbericht op een mooi manier zien in HTML + CSS.

---
