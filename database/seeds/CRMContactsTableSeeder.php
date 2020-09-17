<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CRMContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Contacts::class,  50)->create();
    }
}
