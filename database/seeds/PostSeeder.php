<?php

use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;




class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $tag_ids = Tag::pluck('id')->toArray();
        $category_ids = Category::pluck('id')->toArray();

        for ($i = 0; $i < 30; $i++) {
            $post = new Post();
            $post->category_id = Arr::random($category_ids);
            $post->title = $faker->text(10);
            $post->content = $faker->paragraphs(2, true);
            $post->slug = Str::slug($post->title, '-');
            $post->is_published = 1;
            $post->save();

            $post_tags = [];
            foreach ($tag_ids as $tag_id) {
                if ($faker->boolean()) $post_tags[] = $tag_id;
            }

            $post->tags()->attach($post_tags);
        }
    }
}
