<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('contacts')->insert([
        //     [
        //         'firstname' => 'John',
        //         'lastname' => 'Doe',
        //         'email' => 'john.doe@fakemail.cn',
        //         'phonenumber' => 'XXXXXXX',
        //         'comments' => 'none',
        //     ],[
        //         'firstname' => 'Jane',
        //         'lastname' => 'Doe',
        //         'email' => 'jane.doe@fakemail.cn',
        //         'phonenumber' => 'XXXXX',
        //         'comments' => 'nope, still nothing...',
        //     ],
        // ]);
        Contact::factory()->times(50)->create();
    }
}
