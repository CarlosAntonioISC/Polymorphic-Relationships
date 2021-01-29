<?php

namespace Database\Seeders;

use App\Models\Image;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Group::factory()->count(3)->create();


        \App\Models\Level::factory()->create(['name' => 'bronze']);
        \App\Models\Level::factory()->create(['name' => 'silver']);
        \App\Models\Level::factory()->create(['name' => 'gold']);

        \App\Models\User::factory(10)->create()->each( function($user) {

            $profile = $user->profile()->save(\App\Models\Profile::factory()->make());

            $profile->location()->save(\App\Models\Location::factory()->make());

            $user->groups()->attach($this->array(rand(1,3)));
            $user->image()->save(Image::factory()->make(['url' => 'http://lorempixel.com/200/200/people/'. $user->id . '/']));
        });

        \App\Models\Category::factory()->count(5)->create();
        \App\Models\Tag::factory()->count(5)->create();

        \App\Models\Post::factory()->count(100)->create()->each( function($post) {
            $post->image()->save(\App\Models\Image::factory()->make(['url' => 'https://picsum.photos/id/'. $post->id . '/1024/1024']));
            $post->tags()->attach($this->array(rand(1,5)));

            $num_comments = rand(1,10);

            for ($i=0; $i < $num_comments; $i++) { 
                $post->comments()->save(\App\Models\Comment::factory()->make());
            }
        });

        \App\Models\Video::factory()->count(50)->create()->each( function($video) {
            $video->image()->save(\App\Models\Image::factory()->make(['url' => 'https://picsum.photos/id/'. $video->id . '/1024/1024']));
            $video->tags()->attach($this->array(rand(1,5)));

            $num_comments = rand(1,10);

            for ($i=0; $i < $num_comments; $i++) { 
                $video->comments()->save(\App\Models\Comment::factory()->make());
            }
        });
    }

    public function array($max)
    {
        $values = [];

        for ($i=1; $i <= $max; $i++) { 
            $values[$i] = $i;
        }

        return $values;
    }
}
