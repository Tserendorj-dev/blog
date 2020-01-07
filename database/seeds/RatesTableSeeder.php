<?php

use Illuminate\Database\Seeder;

class RatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('rates')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        DB::table('rates')->insert([
            [
                'rate_name' => '20%',
                'rate_value' => '20',
                'lang' => 'mn',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'rate_name' => '40%',
                'rate_value' => '40',
                'lang' => 'mn',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'rate_name' => '50%',
                'rate_value' => '50',
                'lang' => 'mn',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'rate_name' => '60%',
                'rate_value' => '60',
                'lang' => 'mn',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'rate_name' => '70%',
                'rate_value' => '70',
                'lang' => 'mn',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'rate_name' => '80%',
                'rate_value' => '80',
                'lang' => 'mn',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'rate_name' => '90%',
                'rate_value' => '90',
                'lang' => 'mn',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'rate_name' => '100%',
                'rate_value' => '100',
                'lang' => 'mn',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
        ]);
    }
}
