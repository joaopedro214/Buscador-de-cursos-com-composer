<?php

require 'vendor/autoload.php';

use Alura\BuscadorDeCursos\Buscador;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

$client = new Client(['base_uri' => 'https://www.alura.com.br/']);
$crawler = new Crawler();

$buscador = new Buscador($client, $crawler);
$cursos = $buscador->buscar('/cursos-online-programacao/php');


foreach ($cursos as $curso) {
    echo $curso . PHP_EOL;
}


// Para configurar a PSR-4 em um projeto (levando em consideração que a estrutura de arquivos já atende os requisitos).
// Basta adicionar na chave psr-4 filha da chave autoload a chave contendo nosso vendor namespace e o valor contendo nossa pasta base
// Exemplo: { “autoload”: { “psr-4”: { “Alura\\Namespace\\Padrao\\”: “src/php/code/” } } }
// É colocado duas barras invertidas \\ para cada barra normal, pois o PHP interpreta a barra invertida como um caractere de escape.