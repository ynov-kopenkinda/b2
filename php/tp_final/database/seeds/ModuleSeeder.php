<?php

use App\Module;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ids = DB::select('select id from promos;');
        factory(Module::class, 2)->create()->each(function (Module $m) use ($ids) {
            $sr = rand(0, sizeof($ids) - 1);
            $er = rand(0, sizeof($ids) - 1);
            if ($sr > $er) {
                $_t = $sr;
                $sr = $er;
                $er = $_t;
            }
            $a_ids = array_map(function ($el) {
                return $el->id;
            }, array_slice($ids, $sr, sizeof($ids) - $er - $sr),);
            $m->promos()->detach();
            $m->promos()->attach($a_ids);
        });
    }
}
