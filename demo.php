<?php

$url = 'https://www.medindia.net/drug-price/brand-index.asp?alpha=A';
// $url = 'https://www.google.com';
$webData = file_get_contents($url);

echo "<pre>";
echo print_r($webData);
echo "</pre>";