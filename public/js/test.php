<?php       
$where = "";
$to = "";
$errcode = "0";
/*$api = file_get_contents("https://api.trafiklab.se//sl//reseplanerare//intermediate//10.01619054.1362430947//1//C0-0:0.json");
$arr = json_decode($api);
var_dump($arr);

foreach($arr->HafasResponse->IntermediateStops->IntermediateStop as $n)
  echo $n->Name."<br>";           g
  */
if(isset($_GET)){
$where = urlencode($_GET['where']);
$to = urlencode($_GET['to']);
      
      
$bitmaskconf = 2; //2 is for buses  
$trafikrobot = "https://api.trafiklab.se/samtrafiken/resrobot/StationsInZone.json?apiVersion=2.1&centerX=18.057489&centerY=59.332412&radius=2000&coordSys=WGS84";      
$url = "https://api.trafiklab.se/sl/reseplanerare.json?S=$where&Z=$to&Timesel=depart&IntermediateStopsQuery&Lang=sv&key=d1a0f7cf4b494b11bff47ec4d2dc1e55&journeyProducts=$bitmaskconf";


$response =json_decode(file_get_contents($url));

//echo $url;
if(!is_null($response->HafasResponse->Error->Number));
   $errcode = $response->HafasResponse->Error->Number; 


if ($errcode != "0") {
   // echo 'No such trip, choose a subway station';
}


//var_dump($response);
$myVar = '@sa';
$myText = '#text';

$o_id = $response->HafasResponse->Trip[0]->Summary->Origin->$myVar;
$o_name = $response->HafasResponse->Trip[0]->Summary->Origin->$myText;
$query = "a". $o_id ."={name:'".$o_name."', id: ".$o_id."},";
//echo "create ";
echo $query . "<br>";
$prevI = $o_id;

$d_id = $response->HafasResponse->Trip[0]->Summary->Destination->$myVar;
$d_name = $response->HafasResponse->Trip[0]->Summary->Destination->$myText;

$itm = $response->HafasResponse->Trip[0]->SubTrip->IntermediateStopsQuery;
$stations =  file_get_contents($itm);
$st = json_decode($stations);
$stationindex = 0;

foreach($st->HafasResponse->IntermediateStops->IntermediateStop  as $n)
  {
  //print_r($n);
  $stationindex++;
  //echo $n->Name."stationindex: $stationindex<br>";
  $myVar = '@sa';
  $query = "a". $n->$myVar ."={name:'".$n->Name."', id: ".$n->$myVar."},";
  echo $query . "<br>";
 	 echo "a" . $prevI. "<-[:connect]->a". $n->$myVar .",<br>";
  $prevI = $n->$myVar;
 // echo neo={name:'Keanu Reeves'},
  }
  //echo  "ddddd" . $to;
//var_dump($itm);     
}  


$query = "a". $d_id ."={name:'".$d_name."', id: ".$d_id."},";
echo $query . "<br>";
echo "a" . $prevI. "<-[:connect]->a". $d_id .",<br>";