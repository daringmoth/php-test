<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\RequestException;
use View;

class GuzzlerController extends Controller
{
    protected $client = '';

    public function __construct(Client $client){
        $this->client = $client;
    }
    public function index()
    {
        $params = array();
        if(isset($_GET)){
            foreach($_GET AS $key => $value){
                $param = $key. "=". $value;
                array_push($params,$param);
            }
            $par = "?" . implode("&",$params);
            //echo $par;
            //exit();
        }
        //$all = json_decode($this->listCharacters($par), true);
        $all = $this->listCharacters($par);
        return View::make("characters")->with("all", $all);
    }
    public function listCharacters($par=""){
        try {
            $characters = $this->client->request('GET', 'https://rickandmortyapi.com/api/character/' . $par);
            return json_decode($characters->getBody(), true);

        } catch (RequestException $e) {
            //echo Psr7\str($e->getRequest());
            if ($e->hasResponse()) {
                //echo Psr7\str($e->getResponse());
            }
        }
        //return $characters->getBody();
    }

}