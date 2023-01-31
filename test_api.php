<?php
$url = "https://www.iabilet.ro/cauta/?q=bucovina";
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



$linkuri = $xpath->query("//div[@class='col-xs-2']");
$i=0;$j=0;
foreach($linkuri as $link){
    $link_concert[$i]=$link->nodeValue;

    if ($i>1){
    if (( str_contains($link_concert[$i],"ia bilet")==FALSE && str_contains($link_concert[$i-1],"ia bilet")==FALSE)){
    $pret_concert[$j]="Sold Out";
    $j++; }
    else if (str_contains($link_concert[$i],"ia bilet")==TRUE) {$pret_concert[$j]=$link_concert[$i];$j++;
    }

   
    }
    if ($i==0) {
      
         $pret_concert[$j]="Sold Out";$j++;
        
    }
    $i++;
    

}   
$i=0;$z=0;
foreach($linkuri as $link){
    $a_tags = $link->getElementsByTagName('a');
    if ($a_tags->length > 0) {
        $a_tag = $a_tags->item(0);
        $href[$i] = $a_tag->getAttribute("href");
        if ($i>0){
        if ($href[$i]!=$href[$i-1]){
            $href_concert[$z]=$href[$i];
            $z++;
        }
        }
        else {$href_concert[$z]=$href[$i];
            $z++;}

        $i=$i+1;
    }
}

$m=$j;
$linkuri = $xpath->query("//div[@class='col-xs-2']");
$i=0;

    


for($i=0;$i<$n;$i++){
    echo $data_concert[$i] ."<br>" . $titlu_concert[$i] . "<br>" . $pret_concert[$i] . "<br>".$href_concert[$i] . "<br><br>";
}
?>
