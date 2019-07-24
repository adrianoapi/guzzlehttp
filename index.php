<?php


require 'vendor/autoload.php';

use GuzzleHttp\Client;
use  Sunra\PhpSimple\HtmlDomParser;
$client = new Client(array(
    'headers' => array(
        'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.142 Safari/537.36'
    )
));

$url = 'https://www.guiamais.com.br/encontre?what=&where=S%C3%A3o%20Jos%C3%A9%20do%20Rio%20Pardo,%20SP&order=alpha&page=1';

$html = $client->request('GET', $url)->getBody();

$dom = HtmlDomParser::str_get_html($html);

foreach ($dom->find('meta[itemprop=url]') as $key => $link){
    echo $link->content;
    echo "<br>";
}