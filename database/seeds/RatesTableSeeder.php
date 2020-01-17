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
                'rate_name_mn' => '20%',
                'rate_name_jp' => '20%',
                'rate_value' => '20',
                // 'lang' => 'mn',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'rate_name_mn' => '40%',
                'rate_name_jp' => '40%',
                'rate_value' => '40',
                // 'lang' => 'mn',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'rate_name_mn' => '50%',
                'rate_name_jp' => '50%',
                'rate_value' => '50',
                // 'lang' => 'mn',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'rate_name_mn' => '60%',
                'rate_name_jp' => '60%',
                'rate_value' => '60',
                // 'lang' => 'mn',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'rate_name_mn' => '70%',
                'rate_name_jp' => '70%',
                'rate_value' => '70',
                // 'lang' => 'mn',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'rate_name_mn' => '80%',
                'rate_name_jp' => '80%',
                'rate_value' => '80',
                // 'lang' => 'mn',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'rate_name_mn' => '90%',
                'rate_name_jp' => '90%',
                'rate_value' => '90',
                // 'lang' => 'mn',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'rate_name_mn' => '100%',
                'rate_name_jp' => '100%',
                'rate_value' => '100',
                // 'lang' => 'mn',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
        ]);
    }
}
