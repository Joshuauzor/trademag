<?php namespace App\Libraries;


class App_services
{

    public function __construct()
    {
        // $options = [
        //     'baseURI' => 'http://localhost:3000/',
        //     'timeout'  => 5
        // ];
        $this->client = \Config\Services::curlrequest();
    }

    #----------------- Login API -------------------------------------------
    public function login($data)
	{
        $response = $this->client->request('POST', 'login', ['form_params' => $data]);
        return $response;       
    }

    #get countrie
    public function getCountries(){
        $request = $this->client->request('GET', 'https://api.printful.com/countries');
        $response = $request->getBody();
        $res = json_decode($response);
        return $res->result;
    }

    #----------------- Get Single User API -------------------------------------------
    // public function getUser($data){
    //     $response = $this->client->request('GET', '/dashboard/getUser', [
    //         'query' => $data,
    //         'headers' => [
    //             'Authorization' => 'Bearer '. $data['Authorization']
    //         ]
    //     ]);
    //     return $response;       
    // }

    #----------------- post create school API -------------------------------------------
    // public function createschool($data){
        
    //     $response = $this->client->request('post', '/school/create', [
    //         'form_params' => $data,
    //         'headers' => [
    //             'Authorization' => 'Bearer '. $data['Authorization']
    //         ]
    //     ]);
    //     return $response;       
    // }

    #----------------- get all school and count API -------------------------------------------
    // public function getSchools($data){
        
    //     $response = $this->client->request('get', 'school/getAll', [
    //         'headers' => [
    //             'Authorization' => 'Bearer '. $data['Authorization']
    //         ]
    //     ]);
    //     return $response;       
    // }
}