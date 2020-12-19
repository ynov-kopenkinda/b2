<?php

use App\Module;
use App\Promo;
use App\Student;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $promos = Promo::all();
        $modules = DB::select('select id from modules;');
        return factory(Student::class, 20)->create()->each(function (Student $s) use ($promos, $modules) {
            $sr = rand(0, sizeof($modules) - 1);
            $er = rand(0, sizeof($modules) - 1);
            if ($sr > $er) {
                $_t = $sr;
                $sr = $er;
                $er = $_t;
            }
            $a_ids = array_map(function ($el) {
                return $el->id;
            }, array_slice($modules, $sr, sizeof($modules) - $er - $sr),);
            $promo = $promos[rand(0, sizeof($promos) - 1)];
            $s['promo_id'] = $promo->id;
            $s->modules()->attach($a_ids);
            $s->save();
        });
    }
}
