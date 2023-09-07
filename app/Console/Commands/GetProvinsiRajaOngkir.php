<?php

namespace App\Console\Commands;

use App\Http\Helpers\RajaOngkir;
use App\Models\MasterProvinsi;
use Illuminate\Console\Command;

class GetProvinsiRajaOngkir extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rajaongkir:provinsi';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Ambil data provinsi dari raja ongkir';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        RajaOngkir::getRequestAndLoop("/province", function($item) {

            MasterProvinsi::updateOrCreate([
                'id_rajaongkir' => $item['province_id']
            ], [
                'nama_provinsi' => $item['province']
            ]);

        });
    }
}
