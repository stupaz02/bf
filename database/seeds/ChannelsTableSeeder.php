<?php

use App\Channel;
use Illuminate\Database\Seeder;

class ChannelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $channels = Channel::create([
            'name' => 'MOOE',
            'slug' => Str::slug('mooe')
        ]);

        $channels = Channel::create([
            'name' => 'Salary',
            'slug' => Str::slug('Salary')
        ]);
    }
}
