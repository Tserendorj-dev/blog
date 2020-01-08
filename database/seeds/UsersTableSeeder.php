<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('users')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        
        factory(App\User::class, 2)->create();

        // DB::table('users')->insert([
        //     [
        //         'name' => 'admin',//Str::random(10),
        //         'email' => 'admin@blog.mn',//Str::random(10).'@gmail.com',
        //         'level' => '1',
        //         'password' => bcrypt('password123'),
        //         'created_at' => new DateTime(),
        //         'updated_at' => new DateTime(),
        //     ],
        //     [
        //         'name' => 'user',//Str::random(10),
        //         'email' => 'user@blog.mn',//Str::random(10).'@gmail.com',
        //         'level' => '2',
        //         'password' => bcrypt('password123'),
        //         'created_at' => new DateTime(),
        //         'updated_at' => new DateTime(),
        //     ],
        // ]);
    }
}
