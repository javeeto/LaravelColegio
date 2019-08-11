<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class GeneroTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $generos[] = array('Masculino','M');
        $generos[] = array('Femenino','F');
        
        foreach ($generos as $genero) {
            DB::table('generos')->insert([
                'nombre' => $genero[0],
                'nombrecorto' => $genero[1],                
                'created_at' => Carbon::now(),
            ]);
        }
    }
}
