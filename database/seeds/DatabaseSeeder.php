<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      DB::table('ingredientes')->insert([
          'nombre' => 'Pomodoro',
          'precio' => 1,
          'nombre' => 'Mozarella',
          'precio' => 1.5,
          'nombre' => 'Speck',
          'precio' => 2,
          'nombre' => 'Cipolla',
          'precio' => 0.5,
      ]);
    }
}
