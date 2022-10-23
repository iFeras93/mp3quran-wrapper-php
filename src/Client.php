<?php

namespace Iferas93\Mp3quranWrapper;
use GuzzleHttp\Client as GuzzleClient;

class Client
{
    const BASE_URI= "https://mp3quran.net/api";
    const VERSION="v3";

    protected GuzzleClient $guzzle;

    public function __construct()
    {
        $this->guzzle= new GuzzleClient([
            'base_url'=> sprintf(self::BASE_URI."/%s/",self::VERSION)
        ]);
    }

    public function guzzleClient(): GuzzleClient
    {
        return $this->guzzle;
    }
}
