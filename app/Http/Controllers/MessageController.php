<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function mensagem(Request $request){

        $messagem = $request->input('message');
        $mobile = $request->input('mobile');
        $encodeMessage = urlencode($messagem);
        $authkey = '';
        $senderId = '';
        $route = 4;
        $postData = $request->all();
        $mobileNumber = implode('',$postData['mobile']);
        $arr = str_split($mobileNumber, '9');
        $mobiles = implode(",", $arr);
        //print_r($mobiles);
        //exit();
        $data = array(
            'authkey'=> $authkey,
            'mobiles'=> $mobiles,
            'message'=> $encodeMessage,
            'sender'=> $senderId,
            'route'=> $route,
        );
        $url = "http:// http.php";
        $ch = curl_init();
        curl-curl_setopt_array($ch, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER =>true,
            CURLOPT_POST =>true,
            CURLOPT_POSTFIELDS =>$postData,
        ));

        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFPEER, 0);

        //get response
        $output = curl_exec($ch);

        //print error if any
        if (curlerrno($ch)){
            echo 'error:'.curl_error($ch);
        }

        curl_close($ch);
        return redirect('/')->with('response', 'Message sent successfully');

    }
}
