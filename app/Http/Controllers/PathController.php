<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PathController extends Controller
{
    public function getRelativePath ($path) {

    	$baseAdd = asset('');
    	$prefix="";

    	$pathArray=array_slice(explode('/', $path),1);

    	//use right array function
    	$baseAddArray = array_slice(explode('/', $baseAdd),3);  
		array_pop($baseAddArray);

    	foreach ($baseAddArray as $Add) {
    		
    		//print_r($baseAddArray);
    		//echo' - ';
    		//print_r($pathArray);
    		//echo '<br>';

    		if($baseAddArray==$pathArray) {
    		} else {
    			$prefix.='../';
    			//echo $prefix.'<br>';
    			array_pop($baseAddArray);
    		}

    	}

    	if($prefix=='') {
    		$prefix='./';
    	}

    	if($baseAddArray==array()) {
    		$prefix.=implode('/',$pathArray);
    	}

    	return $prefix;

    }

	public function pathView($path) {

		  $address_array = explode(':', $path);    
		
		  $folder = implode('/', $address_array);  
		  $dir=opendir($this->getRelativePath($folder));

		 while ($item = readdir($dir)) 
		    { 
		    	//echo $item;
		    }

            //view('event');

	}

}
