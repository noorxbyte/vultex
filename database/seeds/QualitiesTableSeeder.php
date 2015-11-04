<?php

use Illuminate\Database\Seeder;

class QualitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table('qualities')->delete();
 
        $qualities = array(
            ['id' => 1, 'quality' => 'BRRip', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 2, 'quality' => 'HDRip', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 3, 'quality' => 'CAM', 'created_at' => new DateTime, 'updated_at' => new DateTime],
        );
 
        // Uncomment the below to run the seeder
        DB::table('qualities')->insert($qualities);
    }
}
