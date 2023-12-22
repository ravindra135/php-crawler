<?php 
include './vendor/autoload.php';

use Spekulatius\PHPScraper\PHPScraper as PHPScraper;
use Symfony\Component\DomCrawler\Crawler as Crawler;
use PhpOffice\PhpSpreadsheet\Spreadsheet as SpreadSheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx as WriterXlsx;

$web = new PHPScraper();
$crawler = new Crawler();

$url = 'https://www.medindia.net/drug-price/brand-index.asp?alpha=A';
// $url = 'https://webscraper.io/test-sites'; // Test Site

$siteHit = $web->go($url);
// echo "<pre>";
// print_r($siteHit);
// echo "</pre>";
// die();

// $links = $web->filter("//h2[@class='site-heading']//a");
$links = $web->filter("//table[@class='customers']");
// echo "<pre>";
//     print_r($links[0]);
//     echo "</pre>";die();
$data = [];

foreach ($links as $index => $element) {

    // $data[$index] = [
    //     'link' => $element->getAttribute('href'),
    //     'value' => trim($element->nodeValue)
    // ];

    echo "<pre>";
    echo $index;
    // print_r($element->firstElementChild);
    // echo trim($element->nodeValue)."<br>";
    echo "</pre>";
}

die(1);

echo "<pre>";
echo print_r($data)."<br>";
echo "</pre>";

$spreadsheet = new Spreadsheet();
$worksheet = $spreadsheet->getActiveSheet();

foreach ($data as $rowNum => $rowData) {
   $worksheet->fromArray($rowData, null, 'A' . ($rowNum + 1));
}

$writer = new WriterXlsx($spreadsheet);
$writer->save('output.xlsx');
