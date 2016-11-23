<?php

namespace AppBundle\Helper;

use GuzzleHttp\Client;
/**
 * Description of WebScraper
 * returns contents and size of page using Guzzle Client method get
  */
class WebScraper {
    
    public $url;
    public $item;
    
    public function contents($url) { 
        
        $this->url = $url;
        
        $feed = new Client();
        
        $data = $feed->get($this->url);
        // convert to kb , 1 decimal place
        $size = round(($data->getBody()->getSize() / 1024),1);
        
        $result  = array('html' => $data->getBody()->getContents(),'size' => $size.'kb');  
                
        return  $result;
    }
    
    public function clean($item) { 
        
        $this->item = $item;
           
        $result = preg_replace("/[^0-9\.]/", "",$this->item);
                    
        return $result;
    }
}
