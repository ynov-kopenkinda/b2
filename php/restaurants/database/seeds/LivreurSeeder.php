<?php

use App\Livreur;
use Illuminate\Database\Seeder;

class LivreurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Livreur::class, 20)->create()->each(function($l) {
            $l->save();
        });
    }
}
