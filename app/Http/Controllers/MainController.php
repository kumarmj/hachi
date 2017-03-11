<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GrahamCampbell\GitHub\Facades\GitHub;

class MainController extends Controller
{
    public function search(Request $request){
        
        $squery = $request->input('squery');
        $url = "https://api.github.com/search/users?q=";
        
        if (strpos($squery, '@') !== false) {
            
            $curl = curl_init($url.$squery);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($curl, CURLOPT_HEADER, 0);
    		curl_setopt($curl, CURLOPT_USERAGENT, 'TechAssign');
    		$response = json_decode(curl_exec($curl), true);
    		$err = curl_error($curl);
    		curl_close($curl);
    		
    		//return var_dump($response);
    		if ($err) {
    			return "cURL Error #:" . $err;
    		} else if($response['total_count'] === 1){
    			//var_dump($response['items'][0]['login']);
    			return redirect()->route('profile', [$response['items'][0]['login']]);
    		} else{
    		    return view('results', ['found'=>false]);
    		}
            
        }else{
            $curl = curl_init($url.'+language:'.$squery.'&sort=followers');
    		curl_setopt($curl, CURLOPT_USERAGENT, 'TechAssign');
    		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($curl, CURLOPT_HEADER, 0);
    		$response = curl_exec($curl);
    		$err = curl_error($curl);
    		curl_close($curl);
    		
    		if ($err) {
    			return "cURL Error #:" . $err;
    		} else {
    		    $response = json_decode($response, true);
    		    //$response['items'];
    		    return view('results', ['found' => true, 'results' => $response['items']]);
    		}
            
        }
    }
    
    
    public function show($username){
        $curl = curl_init('https://api.github.com/users/'.$username);
		curl_setopt($curl, CURLOPT_USERAGENT, 'TechAssign');
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HEADER, 0);
		$response = json_decode(curl_exec($curl));
		$err = curl_error($curl);
		curl_close($curl);
		
		if($err){
		    return "cURL Error #:" . $err;
		} else{
		    return view('profile', ["result" => $response]);
		}
    }
    
    public function special(Request $request){
    	$location = $request->input('city');
    	$url = "https://api.github.com/search/users?q=";
    	
    	$curl = curl_init($url.'+location:'.$location.'&sort=followers');
		curl_setopt($curl, CURLOPT_USERAGENT, 'TechAssign');
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HEADER, 0);
		$response = curl_exec($curl);
		$err = curl_error($curl);
		curl_close($curl);
		
		if ($err) {
			return "cURL Error #:" . $err;
		} else {
		    $response = json_decode($response, true);
		    $response['items'];
		    return view('results', ['found' => true, 'results' => $response['items']]);
		}
    }
}