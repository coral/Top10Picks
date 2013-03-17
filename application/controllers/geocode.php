<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require("phar://".APPPATH."/libraries/neo4jphp.phar");
	use Everyman\Neo4j\Client,
	Everyman\Neo4j\Index\NodeIndex,
	Everyman\Neo4j\Relationship,
	Everyman\Neo4j\Node,
	Everyman\Neo4j\Cypher,
	Everyman\Neo4j\Transport,
	Everyman\Neo4j\Query,
	Everyman\Neo4j\PropertyContainer,
	Everyman\Neo4j\Query\Row;
	
class Geocode extends CI_Controller {

	 
	public function __construct()
	{
	    parent::__construct();
	    


	}
	
	public function index($lat = "59.31536440000001", $lng = "18.019315799999998")
	{
		$jsrc = "http://maps.googleapis.com/maps/api/geocode/json?latlng=".$lat.",".$lng."&sensor=true";
		$json = file_get_contents($jsrc);
		$result = json_decode($json);
		//print_r($result);
		
		$status = $result->status;
		if($status == "OK"){
			if(isset($result->results[0]->address_components[1]->long_name)) {
				echo $result->results[0]->address_components[1]->long_name;
				print " ";
			}
			if(isset($result->results[0]->address_components[0]->long_name)) {
				echo $result->results[0]->address_components[0]->long_name;
				print " ";
			}
			
			if(isset($result->results[0]->address_components[2]->long_name)) {
				echo $result->results[0]->address_components[2]->long_name;
			}
		}
		
	}
	
	public function json($lat = "59.3348987", $lng = "17.9780504")
	{
	
		$lat = $this->input->get('latitude');
		$lng = $this->input->get('longitude');
	
		$jsrc = "http://maps.googleapis.com/maps/api/geocode/json?latlng=".$lat.",".$lng."&sensor=true";
		$json = file_get_contents($jsrc);
		
		$result = json_decode($json);
		
		$output = array();
		$status = $result->status;
		
		if($status == "OK"){
			if(isset($result->results[0]->address_components[1]->long_name)) {
				$street = $result->results[0]->address_components[1]->long_name . " ";
				if(isset($result->results[0]->address_components[0]->long_name)) {
					$street = $street .  $result->results[0]->address_components[0]->long_name;
				}
				$output['street'] = $street;
			} 
			
			if(isset($result->results[0]->address_components[2]->long_name)) {
					$output['city'] = $result->results[0]->address_components[2]->long_name;
			} else {
				$output['street'] = "Kan inte estimera position";
				$output['city'] = "Kan inte estimera position";
			}
			
			echo json_encode((object) $output);
		}
		
	}


	public function test($id = 200103431, $stations = 3)
	{
		
		
		$client = new Client();
		$queryTemplate = "start from = node:node_auto_index(id={id}),  to= node(*) MATCH p = allShortestPaths(from-[*..".$stations."]-to) RETURN extract(n in nodes(p) : n.name);";
		$query = new Cypher\Query($client, $queryTemplate, array('id'=>$id));
		$result = $query->getResultSet();
		$lol = serialize($result);
		$test =(array) unserialize($lol);
		$arr = array();
		$i = 0;
		foreach ($test as $row) {
		if ($i == 0) {
		} else if($i == 1) {}
		else {
    $arr[] = $row;
			print(json_encode($row));
		}
		$i++;
		}
    print_r($arr);
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
