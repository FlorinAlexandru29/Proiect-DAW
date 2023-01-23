<?php
$url = "https://www.iabilet.ro/cauta/?q=trooper";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$data = curl_exec($ch);
curl_close($ch);

$dom = new DOMDocument;
$dom->loadHTML($data);
$xpath = new DOMXPath($dom);

$elements = $xpath->query("//div[@class='date-start']");
foreach ($elements as $element) {
    echo $element->nodeValue;
}
?>