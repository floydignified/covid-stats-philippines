<?php

namespace App\Http\Controllers\COVID;

use App\Http\Controllers\BaseController;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

/**
 * Data Class
 */
class DataController extends BaseController
{
    protected $client, $uri;

    public function __construct()
    {
        $this->initializeClient();
        $this->uri = "key-value-stores/lFItbkoNDXKeSWBBA/records/LATEST?disableRedirect=true";
    }

    /**
     * Fetch latest COVID data
     *
     * @param Request $request
     * @return Response
     */
    public function fetch(Request $request)
    {
        //call covid data api
        $response = $this->client
            ->get($this->uri);

        return response()->json([
            "message" => "Successfully fetched COVID-19 Data",
            "covid" => json_decode($response->getBody()),
        ], 200);
    }

    /**
     * Initialize http request clientss
     *
     * @return void
     */
    protected function initializeClient()
    {
        $this->client = new Client([
            "base_uri" => "https://api.apify.com/v2/",
        ]);
    }
}
