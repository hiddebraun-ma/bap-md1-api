# Een API aanroepen en gegevens gebruiken op je website

Je gaat oefenen met het aanroepen van een API (Application Programming Interface) 
Een API ontsluit data op de server in eeb gestructureerd formaat, meestal JSON of XML.

Er zijn enorm veel API's die je kunt gebruiken. Denk aan:

- Postcode / Geolocatie API
- Weersvoorspelling opvragen
- Gegevens over films opzoeken
- OV informatie / halte info, vertrektijden etc.
- Facebook API / Instagram API etc. etc. (lastiger)

Kijk eens op https://any-api.com of https://public-apis.xyz/ voor een overzicht van allerlei API's.

---
Je kunt een API aanroepen met PHP (of een andere script taal) en vaak ook met Javascript.
Om met PHP een API aan te roepen moet je een HTTP Client gebruiken.
Dit is een soort browser in je code, maar dan zonder grafische weergave. 
Deze HTTP Client kun je zelf helemaal instellen:

In dit project maak je gebruik van [Guzzle](http://docs.guzzlephp.org/en/stable/quickstart.html), dit is een open source Http Client die je kunt gebruiken in PHP.
Bekijk in de code hoe je deze kunt gebruiken.

Je stelt de client in:
- Welke API en URL wil je opvragen
- Stel de juiste parameters in
- Roep de API aan en lees het resultaat uit.

Het voorbeeld maakt gebruik van een Movie API waar je kunt zoeken naar film titels.
Er is een simpel formulier met een zoekveld gemaakt. Als je dit form opstuurt wordt de zoekquery parameter vervolgens gebruikt om de Movie API aan te roepen.
Om te weten hoe deze API werkt, heb ik eerst **de API documentatie gelezen**. In dit geval: http://omdbapi.com/

Je kunt zoeken op ID, Title of een vrije zoekopdracht.
De URL hiervoor is:

http://www.omdbapi.com/?apikey=[apikey]&s=[zoekopdracht]

De API key heb ik aangevraagd (gratis) dat is `d28c89b3`
Als ik zoek naar 'Avengers' wordt de URL dus:

http://www.omdbapi.com/?apikey=d28c89b3&s=Avengers


Als ik de HTTP Client deze aanroept, krijg deze JSON terug die volgens het MVC principe (ja ja, daar is ie weer) aan de view wordt gegeven.
In de view kan er dan een mooie weergave van worden gemaakt.

De JSON die je terugkrijgt heeft deze structuur.

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

Met de de functie [json_decode()](https://www.php.net/manual/en/function.json-decode.php) kan je dit omzetten naar een array in PHP.

---

Kijk of je de code snapt en kies nu zelf een API die je wilt gebruiken.
Kies een API die gratis is en die gebruik maakt van een API key (er zijn ook ingewikkelde manieren, zoals OAuth, die zou ik even overslaan nog)

---

### Suggesties

#### Postcode API

https://postcode-api.nu  
API Key: `vraag aan docent`

Maak een form met postcode en huisnummer en vul straat, huisnummer en plaats automatisch in.
Kan ook met Javascript en AJAX....

---

#### Openweather Api

https://openweathermap.org/api

Registreer je, lees de documentatie en doe een request naar de API.
Laat het weerbericht op een mooi manier zien in HTML + CSS.

---
