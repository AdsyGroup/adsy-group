<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ListGameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        DB::table('tb_listgame')->insert([
            'title' => "Card Game",
            'description' => 'ini card game',
            'image_url' => '/src/assets/unsplash_FW589opoYjg.png',
            'link' => '/cardgame'
        ]);
    }
}
