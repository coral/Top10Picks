<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
	
	public function json($lat = "59.31536440000001", $lng = "18.019315799999998")
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
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
