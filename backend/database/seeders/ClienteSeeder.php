<?php

namespace Database\Seeders;

use Database\Seeders\Traits\TruncateTable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Database\Seeders\Traits\DisableForeignKeys;

/**
 * Class ClienteSeeder.
 */
class ClienteSeeder extends Seeder
{
    use DisableForeignKeys;
    use TruncateTable;
    
    /**
     * Seed the application's database.
     */
    public function run()
    {
        $this->disableForeignKeys();

        DB::table('clientes')->delete();
        
        DB::table('clientes')->insert(array (
            0 => 
            array (
                'id' => 1,
                'rut' => '18620855-1',
                'name' => 'Angel Serrano',
            ),
            1 => 
            array (
                'id' => 2,
                'rut' => '11345435-2',
                'name' => 'Roser Abreu',
            ),
            2 => 
            array (
                'id' => 3,
                'rut' => '14256777-k',
                'name' => 'Rosa Campos',
            ),
            3 => 
            array (
                'id' => 4,
                'rut' => '12675688-0',
                'name' => 'Celestino Fuentes',
            ),
            4 => 
            array (
                'id' => 5,
                'rut' => '14234334-4',
                'name' => 'Rebeca Rojas',
            ),
            5 => 
            array (
                'id' => 6,
                'rut' => '10152323-8',
                'name' => 'Andrea Palomo',
            ),
            6 => 
            array (
                'id' => 7,
                'rut' => '15587715-4',
                'name' => 'Maria Inmaculada Jiménez',
            ),
            7 => 
            array (
                'id' => 8,
                'rut' => '15034590-7',
                'name' => 'Marcela Navarro',
            ),
            8 => 
            array (
                'id' => 9,
                'rut' => '11804345-3',
                'name' => 'Francisco Manuel Gago',
            ),
            9 => 
            array (
                'id' => 10,
                'rut' => '13804238-0',
                'name' => 'Patricio Duran',
            ),
        ));

        $this->enableForeignKeys();
    }
}
