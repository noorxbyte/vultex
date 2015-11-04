<?php

use Illuminate\Database\Seeder;

class LanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table('languages')->delete();
 
        $languages = array(
            ['id' => 1, 'language' => 'English', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 2, 'language' => 'Korean', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 3, 'language' => 'French', 'created_at' => new DateTime, 'updated_at' => new DateTime],
        );
 
        // Uncomment the below to run the seeder
        DB::table('languages')->insert($languages);
    }
}
