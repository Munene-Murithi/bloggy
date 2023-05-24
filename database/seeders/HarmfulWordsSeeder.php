<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\HarmfulWord;


class HarmfulWordsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $harmfulWords = [
            'damn',
            'hell',
            'nigga',
            'shit',
            'bloody',
            'bastard',
            'bullshit',
            'bitch',
        ];

        foreach ($harmfulWords as $word) {
            HarmfulWord::create(['word' => $word]);
        }
    }
}
