<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Helpers\Tools;
use App\Models\MasterKota;
use App\Models\MasterProvinsi;
use Illuminate\Http\Request;

class WilayahC extends Controller
{


    public function cariProvinsi(Request $request) {
        $id_provinsi    = $request->id;
        $masterProvinsi = MasterProvinsi::find($id_provinsi);

        if($masterProvinsi == null) {
            return Tools::jsonResponse('error', "Provinsi tidak ditemukan", $masterProvinsi);
        }
        return Tools::jsonResponse('success', "Data Provinsi berdasarkan id", $masterProvinsi);
    }


    public function cariKota(Request $request) {
        $city_id    = $request->id;
        $masterKota = MasterKota::find($city_id);

        if($masterKota == null) {
            return Tools::jsonResponse('error', "Kota tidak ditemukan", $masterKota);
        }
        return Tools::jsonResponse('success', "Data Kota berdasarkan id", $masterKota);
    }
}
