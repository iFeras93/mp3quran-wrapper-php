<?php
namespace Iferas93\Mp3quranWrapper;

use GuzzleHttp\Client;

class QuranWrapper
{

    private $baseUri="https://mp3quran.net/api";
    private $version ="v3";

    protected function serviceBaseUri()
    {
        return $this->baseUri.'/'.$this->version;
    }

    #TODO:: move this business logic to another class and do refactor
    protected function makeRequest($endpoint,$method = 'GET',$queryParams=[],$bodyParams=[],$headers=[])
    {
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => $this->serviceBaseUri(),
            // You can set any number of default request options.
            'timeout'  => 30,
        ]);
        try {
            $request= $client->request($method,$endpoint,[
                'query'=>$queryParams,
            ]);
            $response= $request->getBody();
            return $response;
        }catch (Exception $exception){
            return $exception;
        }
    }


    public function getAvailableContentLanguages()
    {
        return $this->makeRequest('languages');
    }
}
