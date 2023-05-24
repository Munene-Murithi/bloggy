<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tags')->insert([
            ['name' => 'celebrity'],
            ['name' => 'food'],
            ['name' => 'travel'],
            ['name' => 'politics'],
            ['name' => 'sport'],
            ['name' => 'culture'],
            ['name' => 'business'],
        ]);
    }
}
