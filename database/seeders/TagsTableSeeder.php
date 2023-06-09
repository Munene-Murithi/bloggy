<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagsTableSeeder extends Seeder
{
    public function run()
    {
        $tags = [
            'beauty',
            'news',
            'business',
            'sports',
            'technology',
            'celebrity',
            'movies',
            'music',
            'fashion',
            'fitness',
            'automotives',
            'lifestyle',
        ];

        foreach ($tags as $tagName) {
            $tag = new Tag;
            $tag->name = $tagName;
            $tag->save();
        }
    }
}
