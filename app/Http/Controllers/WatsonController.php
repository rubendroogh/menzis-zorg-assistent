<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WatsonController extends Controller
{
    public function send_request(Request $request){
        // ID of Watson Assistant Workspace
        $workspace_id = '1ac057b8-0634-4c6a-b8e5-ec8a46e1da57';
        // Release date of the API version in YYYY-MM-DD format (*)
        $release_date = '2018-09-20';
        // Username of the service credentials
        $username = 'apikey';
        // Password of the service credentials
        $password = 'PZyDAuxKrJv2tLPg6r8JZRKOnPMJFk6YCkjKxxrZ5bdr';

        // Make a request message for Watson API in json
        $data['input']['text'] = $request->message;
        if(isset($_POST['context']) && $_POST['context']){
            $data['context'] = json_decode($_POST['context'], JSON_UNESCAPED_UNICODE); // Encode multibyte Unicode characters literally (default is to escape as \uXXXX)
        }
        $data['alternate_intents'] = false;

        // Encode json data
        $json = json_encode($data, JSON_UNESCAPED_UNICODE);

        // Post the json to Watson Assistant API via cURL
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, 'https://gateway-fra.watsonplatform.net/assistant/api/v1/workspaces/'.$workspace_id.'/message?version='.$release_date); // Instructions here: https://www.ibm.com/watson/developercloud/assistant/api/v1/curl.html?curl#message
        curl_setopt($ch, CURLOPT_USERPWD, $username.":".$password); // Set cURL Watson Assistant credentials
        curl_setopt($ch, CURLOPT_POST, true );
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); // Set cURL headers
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);

        // Prepare response, close cURL and send response to front-end
        $result = trim(curl_exec($ch)); // Prepare response
        curl_close($ch); // Close
        echo json_encode($result, JSON_UNESCAPED_UNICODE); // Send response
    }
}
