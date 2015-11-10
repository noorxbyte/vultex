<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table('users')->delete();
 
        $users = array(
            ['id' => 1, 'name' => 'Hussain Noor Mohamed', 'email' => 'noor.xbyte@gmail.com', 'password' => bcrypt('123456'), 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 2, 'name' => 'Mohamed Arham', 'email' => 'c4.arham@gmail.com', 'password' => bcrypt('123456'), 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 3, 'name' => 'Mohamed Aman Shareef', 'email' => 'mohamed_aman@outlook.com', 'password' => bcrypt('123456'), 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 4, 'name' => 'Mohamed Zihan Zahir', 'email' => 'xihan_xahir@hotmail.com', 'password' => bcrypt('123456'), 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 5, 'name' => 'Abdulla Yaniu Jaleel', 'email' => 'jalylyaaniu@gmail.com', 'password' => bcrypt('123456'), 'created_at' => new DateTime, 'updated_at' => new DateTime],
        );
 
        // Uncomment the below to run the seeder
        DB::table('users')->insert($users);
    }
}
