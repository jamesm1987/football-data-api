<?php
/**
 * Created by PhpStorm.
 * User: jamesm
 * Date: 09/01/22
 * Time: 20:19 PM
 */

namespace jamesm\APIfootball;

use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;
use App;


class APIFootballServiceProvider extends ServiceProvider
{
    public function boot()
    {


    }

    public function register()
    {
        $this->app->bind('football', function()
        {
            $client = new Client([
                'base_uri'  =>  'https://api-football-v1.p.rapidapi.com',
                'headers'   =>  [
                    "X-RapidAPI-Host" => "api-football-v1.p.rapidapi.com",
                    'X-RapidAPI-Key' => getenv('APIFOOTBALL_API_KEY')
                ]
            ]);

            return new APIFootball($client);
        });

    }

}
