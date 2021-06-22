<?php 
define('GOOGLE_MAP_KEY', 'AIzaSyB7FAMqInuUef2TdI355-QDrcb5imRT2yU');
if(!function_exists('get_state')){
    function get_state($lat,$long){
        $url = "https://maps.googleapis.com/maps/api/geocode/json?latlng=$lat,$long&sensor=false&key=".GOOGLE_MAP_KEY;
        $result = file_get_contents($url);
        
        $result = json_decode($result);


        $state = ''; $country = '';
        if(isset($result->results)&& is_array($result->results)){
            foreach($result->results as $r){
                
                foreach($r->address_components as $address_component){
                    if(empty($state) 
                            && in_array('administrative_area_level_1', $address_component->types) 
                            && isset($address_component->short_name)){
                        $state = $address_component->short_name;
                    }
                    if(empty($country) 
                            && in_array('country', $address_component->types) 
                            && isset($address_component->short_name)){
                        $country = $address_component->short_name;
                    }
                    if(!empty($state) && !empty($country)){
                        break;
                    }
                }
                if(!empty($state) && !empty($country)){
                        break;
                    }
            }
        }
        return compact("state","country");
    }
}




?>