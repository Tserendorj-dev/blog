<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('categories')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        
        DB::table('categories')->insert([
            [
                'cat_name' => 'Эрүүл мэнд',
                'lang' => 'mn',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'cat_name' => 'Боловсрол',
                'lang' => 'mn',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
        ]);
    }
}
