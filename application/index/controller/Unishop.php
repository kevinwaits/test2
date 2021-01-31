<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2021/1/21
 * Time: 9:48
 */

namespace app\index\controller;

use think\Controller;
use think\Db;

class Unishop extends Controller
{

    public function curl_standar()
    {
        $apikey = "9e94b084e8e568c77747e24ecd9c31ab";
        $mobile = "18395832343";
        $text="【宁波捷文】您的验证码是1234";
        $data=array('text'=>$text,'apikey'=>$apikey,'mobile'=>$mobile);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept:text/plain;charset=utf-8',
            'Content-Type:application/x-www-form-urlencoded', 'charset=utf-8'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt ($ch, CURLOPT_URL, 'https://openapi.mtlab.meitu.com/v1/mtstyle?api_key=36115&api_secret=uI3aYsQGjnfcgq1Y7zgkWSSx1D3HkHsL');
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        $result = curl_exec($ch);
        dump($result);
    }

    public function curl() {


        $image = file_get_contents('meinv.jpg');

        $imageBase64Encode = base64_encode($image);


        $ss = json_encode([
            'parameter' => [
                "filterType"=>"Fa0145JwLfwjjbch",
                "filterAlpha"=> 70,
                'beautyAlpha' => 0,
                'rsp_media_type' => 'jpg',
            ],
            'extra' => (object)[],
            'media_info_list' => [
                [
                    'media_data' => $imageBase64Encode,
                    'media_profiles' => [
                        'media_data_type' => 'jpg'
                    ],
                    'media_extra' =>  (object)[]
                ]
            ],
        ]);

        var_dump($ss);

        $aiBeautyUrl = "https://openapi.mtlab.meitu.com/v1/filter?api_key=uI3aYsQGjnfcgq1Y7zgkWSSx1D3HkHsL&api_secret=B4aKtylja_5mcVS1eJePBb7A1uE6MvP0";

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $aiBeautyUrl,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $ss,
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/json"
            ),
           CURLOPT_SSL_VERIFYHOST=>false,
           CURLOPT_SSLVERSION=>false,
           CURLOPT_SSL_VERIFYPEER=>false,
           CURLOPT_SSL_VERIFYHOST=>false,

        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            echo $response;
        }
    }

    public function test() {

        $image = file_get_contents('meinv.jpg');
        $imageBase64Encode = base64_encode($image);

        $ss = json_encode([
            "parameter"=>[
                "rsp_media_type"=>"base64",
                "styleId"=>1,
            ],
            "media_info_list"=>[
                [
                    "media_data"=>$imageBase64Encode,
                    "media_profiles"=>[
                        "media_data_type"=>"jpg"
                    ]
                ]],
        ]);

//        var_dump($ss);

        $aiBeautyUrl = "https://openapi.mtlab.meitu.com/v1/mtstyle?api_key=uI3aYsQGjnfcgq1Y7zgkWSSx1D3HkHsL&api_secret=B4aKtylja_5mcVS1eJePBb7A1uE6MvP0";

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $aiBeautyUrl,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $ss,
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/json"
            ),
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_SSLVERSION => false,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_SSL_VERIFYHOST => false
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            dump ($response);
            $s = json_decode($response);
//            return();
            $this->assign("myimage", $s->media_info_list[0]->media_data);
            return $this->fetch();
        }
    }
}





