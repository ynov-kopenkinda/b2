<?php

use App\Promo;
use Illuminate\Database\Seeder;

class PromoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Promo::class, 20)->create()->each(function ($e) {
            $e->save();
        });
    }
}
