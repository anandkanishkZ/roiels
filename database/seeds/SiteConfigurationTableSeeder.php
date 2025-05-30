<?php

use Illuminate\Database\Seeder;

class SiteConfigurationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('configurations')->insert([
            'name' => 'Everest',
            'title' => 'Slogan',
            'title2' => 'title2',
            'logo' => '1.jpg',
            'email' => 'email1@gmail.com',
            'email2' => 'email2@gmail.com',
            'phone' => '123',
            'mobile' => '123',
            'address' => 'Kathmandu',
            'info' => 'Everest',
            'facebook' => 'Everest',
            'twitter' => 'Everest',
            'youtube' => 'Everest',
            'instagram' => 'Everest',
            'meta_title' => 'test',
            'meta_keyword' => 'test',
            'meta_description' => 'test',
            'vehicle' => '1.pdf',
            'created_by' => '1'
        ]);
    }
}
