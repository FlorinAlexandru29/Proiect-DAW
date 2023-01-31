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

$date = $xpath->query("//div[@class='date-start']");
$i=0;
foreach ($date as $data) {
    
    $data_concert[$i]=$data->nodeValue;
    $i=$i+1;
}
$titluri = $xpath->query("//div[@class='title']");

$i=0;
foreach ($titluri as $titlu) {
    
    $titlu_concert[$i]=$titlu->nodeValue;
    $i=$i+1;
}
$n=$i;
for($i=0;$i<$n;$i++){
    echo $data_concert[$i] ."<br>" . $titlu_concert[$i] . "<br>";
}


$linkuri = $xpath->query("//div[@class='col-xs-2']");
$i=0;
foreach($linkuri as $link){
    $link_concert[$i]=$link->nodeValue;
    if ($i>0){
    if (( str_contains($link_concert[$i],"ia bilet")==FALSE && str_contains($link_concert[$i-1],"ia bilet")==FALSE))
    echo "Sold Out<br>";}


   if (str_contains($link_concert[$i],"ia bilet")==TRUE) echo "link_concert nr".$i.$link_concert[$i]."<br>";
    $i=$i+1;
}

$links = $xpath->query("//a");
foreach ($links as $link) {
    $href = $link->getAttribute("href");
    echo $href . "<br>";
}
?>
