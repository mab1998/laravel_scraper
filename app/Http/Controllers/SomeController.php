<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Goutte\Client;
use GuzzleHttp\Client as GuzzleClient;

use \DOMDocument;
use DOMXpath;
// use parseToArray;


class SomeController extends Controller
{
		 public function domWeb()
    {
		$goutteClient = new Client();

		$crawler = $goutteClient->request('GET', 'https://www.amazon.fr/XIANG-S%C3%A9curit%C3%A9-Accueil-Nocturne-Monitor/dp/B0878SWQPM/ref=sr_1_1?__mk_fr_FR=%C3%85M%C3%85%C5%BD%C3%95%C3%91&dchild=1&keywords=camera&qid=1595579109&sr=8-1');

		$value=$crawler->getBody();;
		
		// $dom = new DOMDocument(); 
  
		  
		// // Get the strong element 
		// $element = $dom->getElementsByTagName('strong'); 
		  
		// // Get the attribute 
		// $value = $element[0]->getAttribute('attr'); 
		return $value; 
	}
	 public function doWebScraping()
    {
        $goutteClient = new Client();
        $guzzleClient = new GuzzleClient(array(
            'timeout' => 60,
            'verify' => false
        ));
        $goutteClient->setClient($guzzleClient);
        $crawler = $goutteClient->request('GET', 'https://www.amazon.fr/XIANG-S%C3%A9curit%C3%A9-Accueil-Nocturne-Monitor/dp/B0878SWQPM/ref=sr_1_1?__mk_fr_FR=%C3%85M%C3%85%C5%BD%C3%95%C3%91&dchild=1&keywords=camera&qid=1595579109&sr=8-1');
		
		
		
        $crawler->filter('#productTitle')->each(function ($node) {
            dump($node->text());
			// $href = $node->extract(array('src'));
			// dump($href)

        });
		

    }
	
    public function addUser()
    {
		
		 // $guzzleClient=new GuzzleClient(array(
			// 'timeout'=>120,
		// ));
		// $crawler = $guzzleClient->request('GET', 'https://www.amazon.fr/Clarks-Griffin-Derbys-Femme-Taupe/dp/B07N1JS9XJ/ref=sr_1_3?dchild=1&pf_rd_p=bb7ddca2-2783-4e25-9671-ee20e62e4412&pf_rd_r=73XCZRA303R0XK78MFCF&qid=1595542417&rw_html_to_wsrp=1&s=apparel&sr=1-3');
		

	 
	 // $c=$crawler->getBody();
	 
	 $c=file_get_contents("E://0laravel//hosting//app//Http//Controllers//0.html");
	 // return "aaaaaa";
	 $dom = new DomDocument();
	 
	 libxml_use_internal_errors(true);

	 
	 
	 $dom->loadHTML(strval($c));
	 $xpath = new DOMXpath($dom);
	$elements = $xpath->query("//*[@id='productTitle']");
	dump ($elements[0]->nodeValue);
	
	$price = $xpath->query("//*[@id='priceblock_ourprice']");
	dump ($elements[0]->nodeValue);
	
	$images = $xpath->query("//*[@id='altImages']//img/@src");
	
	$array_img = array();

	
	foreach ($images as $image) {
		// dump ($element->nodeValue);
		array_push($array_img, $image->value);
	}
	dump ($array_img);
	


	

	// if (!is_null($elements)) {
	  // foreach ($elements as $element) {
		// dump ($element->nodeValue);
		// dump ($element->nodeName);
		

		// $nodes = $element->childNodes;
		
		// dump($nodes);
		// foreach ($nodes as $node) {
		  // dump( $node->nodeValue);
		// }
	  // }
	// }



	// return strval($elements);
	}
}