<?php
# Code uses a webscraper helper file to get all html contents, keeps it DRY as it's used twice
# Makes use of Domcrawler to loop through and filter by nodes like H2,p and classes productText
# did not seem necessary to put crawler function in helper because of all the different possible ways you might have to filter
# creates an array and then returns this in JSON 

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\DomCrawler\Crawler;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;


class DefaultController extends Controller {
    
    public $results;
    public $total;
            
    /**
     * @Route("/", name="homepage")
     */
        
    public function indexAction()
    {
         // access url and return data              
        $html = $this->container->get('webscraper.helper')->contents("http://hiring-tests.s3-website-eu-west-1.amazonaws.com/2015_Developer_Scrape/5_products.html");
     
        $crawler = new Crawler($html['html']);

        $results = [];
         // loop through the div with the class name product which contains the items  
        $crawler->filter('div.product')->each(function (Crawler $node) use (&$results, &$total) {
                 // pick contents in <h3> similar process with different html markup
                $item =  trim($node->filter('h3')->text()); 
       
                $price =  $this->container->get('webscraper.helper')->clean($node->filter('p')->text()); 
                         
                $link = $node->filterXPath("//a/@href")->text();
                        // go to details sub page and get contents, returns contents html and size of page
                        $secondpage = $this->container->get('webscraper.helper')->contents($link);
                                
                        $crawler2 = new Crawler($secondpage['html']);
            
                        $description = trim($crawler2->filterXPath("//div[@class='productText']")->text());
                                 // create array                
                                 $results["results"][] = array('title' => $item,'size' =>$secondpage['size'],'unit_price' => $price,'description' => $description);
                                 // add prices 
                                 $total+= $price; 
        });
        // add total end of array  
        $results["total"] = ($total);
        // return the array and json 
        return new JsonResponse($results);
                
    }
        
}
