<?php

namespace App\Console\Commands;

use App\Http\Helpers\RajaOngkir;
use App\Models\MasterKota;
use App\Models\MasterProvinsi;
use Illuminate\Console\Command;

class GetKotaRajaOngkir extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rajaongkir:kota';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Ambil data kota dari raja ongkir';


    /**
     * Execute the console command.
     */
    public function handle()
    {
        $master_provinsi = MasterProvinsi::pluck('id_master_provinsi', 'id_rajaongkir');

        RajaOngkir::getRequestAndLoop("/city", function($item) use ($master_provinsi) {

            $id_master_provinsi = @$master_provinsi[$item['province_id']];
            if($id_master_provinsi != null) {

                MasterKota::updateOrCreate([
                    'id_rajaongkir' => $item['city_id']
                ], [
                    'id_master_provinsi' => $id_master_provinsi,
                    'nama_kota'          => $item['city_name'],
                    'tipe_kota'          => $item['type'],
                    'kode_pos'           => $item['postal_code'],
                ]);

            }


        });
    }
}
