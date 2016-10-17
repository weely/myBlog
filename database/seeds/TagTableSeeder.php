<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-9-26
 * Time: 13:10
 */
use App\Tag;
use Illuminate\Database\seeder;

class TagTableSeeder extends Seeder
{
    /**
     * Seed the tags table
     */
    public function run()
    {
        Tag::truncate();

        factory(Tag::class, 5)->create();
    }
}