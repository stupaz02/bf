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
            'name' => 'Laravel',
            'slug' => Str::slug('Laravel')
        ]);

        $channels = Channel::create([
            'name' => 'Vue Js',
            'slug' => Str::slug('Vue Js')
        ]);
    }
}
