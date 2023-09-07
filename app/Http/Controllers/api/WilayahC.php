<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Helpers\RajaOngkir;
use App\Http\Helpers\Tools;
use App\Models\MasterKota;
use App\Models\MasterProvinsi;
use Illuminate\Http\Request;

class WilayahC extends Controller
{


    public function cariProvinsi(Request $request) {
        $id_provinsi = $request->id;

        if($id_provinsi == null) {
            return Tools::jsonResponse('error', "Parameter ID harus diisi");
        }

        $is_direct      = env("IS_DIRECT_RAJAONGKIR");
        $masterProvinsi = null;

        if($is_direct) {

            $result = RajaOngkir::getRequest("province?id=$id_provinsi");
            if($result->ok()) {
                $body = $result->collect();
                $data = @$body['rajaongkir']['results'];
                if($data != null) {
                    $masterProvinsi['id_rajaongkir'] = $data['province_id'];
                    $masterProvinsi['nama_provinsi'] = $data['province'];
                }
            }

        } else {
            $masterProvinsi = MasterProvinsi::find($id_provinsi);
        }

        if($masterProvinsi == null) {
            return Tools::jsonResponse('error', "Provinsi tidak ditemukan", $masterProvinsi);
        }

        return Tools::jsonResponse('success', "Data Provinsi berdasarkan id", $masterProvinsi);
    }


    public function cariKota(Request $request) {
        $city_id    = $request->id;

        if($city_id == null) {
            return Tools::jsonResponse('error', "Parameter ID harus diisi");
        }

        $is_direct  = env("IS_DIRECT_RAJAONGKIR");
        $masterKota = null;

        if($is_direct) {
            $result = RajaOngkir::getRequest("city?id=$city_id");
            if($result->ok()) {
                $body = $result->collect();
                $data = @$body['rajaongkir']['results'];

                if($data != null) {
                    $masterKota['id_rajaongkir'] = $data['city_id'];
                    $masterKota['nama_kota']     = $data['city_name'];
                    $masterKota['tipe_kota']     = $data['type'];
                    $masterKota['kode_pos']      = $data['postal_code'];
                }
            }
        } else {
            $masterKota = MasterKota::find($city_id);
        }

        if($masterKota == null) {
            return Tools::jsonResponse('error', "Kota tidak ditemukan", $masterKota);
        }
        return Tools::jsonResponse('success', "Data Kota berdasarkan id", $masterKota);
    }
}
