<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;

class MailChimpController extends Controller
{
    public function newTemplate()
    {
        /* We get the instance on esps_accounts on id 13 with the following information:
            esp_id: 1 // * The provider is MailChimp
            name: Mailchimp - spmg2022
            serve: us14
            api_key: 24948de8449843d61ebd43ccb867ab4c-us14
         */
        // $client = Mailchimp2::get(13);
        $mailchimp = new \MailchimpMarketing\ApiClient();
        $mailchimp->setConfig([
            'apiKey' => '24948de8449843d61ebd43ccb867ab4c-us14',
            'server' => 'us14'
        ]);

        try {
            $response = $mailchimp->templates->create([
                'name' => 'Prueba de Templateee',
                'settings' => '<h1>Hola Mundo</h1>'
            ]);

            return response($response, 200);
            
        } catch (Exception $e) {
            // $json = json_encode($e->getMessage());
            $error = explode(" ", $e->getMessage());
            var_dump($error); dd();
            return response($e->getMessage(), 200);
        }
    }
}
