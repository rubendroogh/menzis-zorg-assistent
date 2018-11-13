<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WatsonController extends Controller
{
    public function send_request(Request $request){
        // Make a request message for Watson API in json
        $data['input']['text'] = $request->input['text'];

        $json = json_encode($data);

        // Post the json to Watson Assistant API via cURL
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, 'https://gateway-' . env('WATSON_LOCATION') . '.watsonplatform.net/assistant/api/v1/workspaces/' . env('WATSON_WORKSPACE_ID') . '/message?version=' . env('WATSON_VERSION'));
        curl_setopt($ch, CURLOPT_USERPWD, env('WATSON_USERNAME') . ":" . env('WATSON_PASSWORD')); // Set cURL Watson Assistant credentials
        curl_setopt($ch, CURLOPT_POST, true );
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); // Set cURL headers
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);

        // Prepare response, close cURL and send response to front-end
        $result = trim(curl_exec($ch)); // Prepare response
        curl_close($ch); // Close

        return $result;
    }
}
