<?php
# buscar cursos utilizando cookies de login

require 'vendor/autoload.php';

use GuzzleHttp\Client;
use GuzzleHttp\Cookie\CookieJar;
use Symfony\Component\DomCrawler\Crawler;

$token = 'f453a64be45f9b7d79487400a0487fd0ea0cb121413c117f0bfcdcbe5a332d1d';

$client = new Client();

$cookieArray = ['caelum.login.token' => $token];

$cookieJar = CookieJar::fromArray($cookieArray,'cursos.alura.com.br');


$resposta = $client->request(
    'GET',
    'https://cursos.alura.com.br/category/programacao/php',
    [
        'cookies' => $cookieJar
    ]
);

$html = $resposta->getBody();

$crawler = new Crawler();
$crawler->addHtmlContent($html);

$cursos = $crawler->filter(selector: 'subcategoria__item');


$cursos->each(function (Crawler $node) {
   echo $node->attr('card-curso__nome') . PHP_EOL; 
});