<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Startcoral extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	 
	public function __construct()
	{
	    parent::__construct();
	}
	
	public function index()
	{
		$ext['js'] = array('http://code.jquery.com/jquery-1.9.1.min.js','http://code.jquery.com/mobile/1.3.0/jquery.mobile-1.3.0.min.js', '/js/app.js');
		$ext['css'] = array('http://code.jquery.com/mobile/1.3.0/jquery.mobile-1.3.0.min.css', '/css/my.css');
		$this->load->view('header',$ext);
		$this->load->view('index');
		$this->load->view('search');
		$this->load->view('footer');
	}
	
	public function search($lat,$long,$activity,$station)
	{
		
	}
  
    	public function search2($lat,$lng,$activity,$station = "T-centralen")
	{
      
  $lng = "18.057489";
    $lat = "59.332412"; 
  
    $lng = "18.022728";
    $lat = "59.310823" ;  
    
      $url = "https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=$lat,$lng&radius=2000&sensor=false&key=AIzaSyDjXrmAH7nCYMSxXxaIHpUuM9A5L-8HqK4&type=$activity";
//    $url = "https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=59.310823,18.022728&radius=4000&sensor=false&key=AIzaSyDjXrmAH7nCYMSxXxaIHpUuM9A5L-8HqK4&type=food";
  //  $url = "https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=59.310823,18.022728&radius=2000&sensor=true&key=AIzaSyDjXrmAH7nCYMSxXxaIHpUuM9A5L-8HqK4&type=$activity";
    echo $url;
 //   echo $url;
    $result = json_decode(file_get_contents($url));
  //  print_r($result);
/*    $fakes = array
                        (
                            [0] => "T-Centralen"
                            [1] => "Rådhuset"
                            [2] => "Fridhemsplan"
                            [3] => "Stadshagen
                            [4] => "Västra skogen"
                        

                            [0] => "T-Centralen"
                            [1] => "Gamla stan
                            [2] => "Slussen
                            [3] => "Mariatorget
                            [4] => "Zinkensdamm

                            [0] => "T-Centralen
                            [1] => "RÃ¥dhuset
                            [2] => "Fridhemsplan
                            [3] => "Thorildsplan
                            [4] => "Kristineberg
                        );    */                     
//    var_dump($result);
 //   echo "hest" .  $result->next_page_token;
    $i = 0;   
      
    $obj = "";  
    foreach($result->results as $rs){
     
    //  if(!in_array($activity,$rs->types))
    //          continue;
    //  else  {
        $pi = "pa" . $i;
 $obj->picks->$pi->listing->namn = $rs->name;

 $obj->picks->$pi->listing->beskrivning = "Hest" ;  
 if(isset( $rs->photos[0]->photo_reference))
  $obj->picks->$pi->listing->images = $rs->photos[0]->photo_reference; 
   if(isset($rs->photos[0]->photo_reference)){
  $pref = $rs->photos[0]->photo_reference; 
  $ph = "https://maps.googleapis.com/maps/api/place/photo?maxwidth=400&photoreference=$pref&sensor=false&key=AIzaSyDjXrmAH7nCYMSxXxaIHpUuM9A5L-8HqK4";
  }
// echo "PH  " . $ph;
 //$obj->picks->$pi->tunnelbanestation = "Hest" ;  
 //$obj->picks->$pi->beskrivning-> = "Hest" ;
  $obj->picks->$pi->geometry->location->lat = "59.3149239" ;  
   $obj->picks->$pi->geometry->location->lng = "18.0198903" ;    
 $obj->picks->$pi->beskrivning->station = $station;
 $obj->picks->$pi->beskrivning->text = "deala knark med gabe" ;  
      
      
      
  $i++;    
 // if($i > 6)
 //   break;
  //    }
 //  print_r($obj);
       
       
    

 $obj->o1->response_status = "200 OK";
 $obj->o1->matches = "4 matches found";
 
 
 
//
        
      
    
    }
    
    //vecho $i . "MAX RESULT";
    print_r(json_encode($obj));
    
   // $data['obj'] = $obj;
    
   // $this->load->view('search',$data);
   // return $obj;

   // print_r($arr);
  //  echo $arr[0][0][0][0];
 //   echo $arr[0][8][0][0];
    
  
		/*
		returnera
		object
			response status
			antal funna matchningar
			
			array
				objekt
					namn
					beskrivning
					tunnelbanastation
					antal tunnelbanestationer bort
					bild
					*/
        
	}
  
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
