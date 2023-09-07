<?php

namespace App\Http\Helpers;

use Exception;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Response;

class RajaOngkir
{

    protected static $url      = 'https://api.rajaongkir.com/starter';

    public static function getRequest($endpoint){
        $first_char = mb_substr($endpoint, 0, 1);
        if($first_char == "/") {
            $endpoint = substr($endpoint, 1, strlen($endpoint));
        }

        $api_key = env('RAJAONGKIR_APIKEY', '0df6d5bf733214af6c6644eb8717c92c');

        $result = Http::withHeaders([
            'key' => $api_key
        ])->get(self::$url . "/" . $endpoint);
        return $result;
    }


    public static function getRequestAndLoop($endpoint, $callback) {
        $response = self::getRequest($endpoint);
        if($response->ok()) {

            $body = $response->collect();

            $loop_data = @$body['rajaongkir']['results'];

            foreach($loop_data as $k => $v) {
                $callback($v);
            }

        } else {
            throw new Exception("Gagal memuat data dari Raja Ongkir");
        }
    }


}
