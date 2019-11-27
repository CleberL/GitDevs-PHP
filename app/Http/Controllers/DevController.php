<?php

namespace App\Http\Controllers;

use App\Dev;
use Illuminate\Http\Request;
use \GuzzleHttp\Exception\GuzzleException;
use \GuzzleHttp\Client;
use Illuminate\Auth\Events\Login;
use phpDocumentor\Reflection\Location;

class DevController extends Controller
{
    public function index()
    {
        $dev = Dev::all();
        return response()->json($dev);
    }

    public function store($username){

        $exists = Dev::where('login', $username)->first();

        if($exists){
            return response()->json($exists);
        } else{
            $client = new Client();
            $response = $client->get(('http://api.github.com/users/'.$username),['verify' => false])->getBody();
            
            $response = json_decode($response);

            $dev = array(
            "name" => $response->name,
            "login" => $response->login,
            "avatar_url" => $response->avatar_url,
            "bio" => $response->bio,
            "location" => $response->location,
            "email" => $response->email,
            "html_url" => $response->html_url
            );
            
            $res = Dev::create($dev);
            return response()->json($res);
        }
        
    }

    public function search($username){
        $dev = Dev::where('login',$username)->first();
        return response()->json($dev);
    }


    public function delete($username)
    {   
        $dev = Dev::where('login',$username)->first();
        if(!$dev){return response()->json(null);}
        $dev->delete();
		return response()->json($dev);
    }
}
