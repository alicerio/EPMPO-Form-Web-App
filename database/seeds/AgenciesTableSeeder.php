<?php

use Illuminate\Database\Seeder;

class AgenciesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('agencies')->insert(['name' => 'City of El Paso']);
        DB::table('agencies')->insert(['name' => 'SunMetro']);
        DB::table('agencies')->insert(['name' => 'SCRTD']);
        DB::table('agencies')->insert(['name' => 'TxDOT']);
        DB::table('agencies')->insert(['name' => 'City of Horizon']);
        DB::table('agencies')->insert(['name' => 'El Paso County']);
        DB::table('agencies')->insert(['name' => 'City of Socorro']);
        DB::table('agencies')->insert(['name' => 'Project Amistad']);
        DB::table('agencies')->insert(['name' => 'Viba']);
        DB::table('agencies')->insert(['name' => 'South Central Regional Transit District']);
    }
}
