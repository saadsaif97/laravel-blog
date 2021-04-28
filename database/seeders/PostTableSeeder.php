<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $user1 = User::create([
            'name'=>'ding',
            'email'=>'ding@gmail.com',
            'password'=> Hash::make('password'),
        ]);
        $user2 = User::create([
            'name'=>'dong',
            'email'=>'dong@gmail.com',
            'password'=> Hash::make('password'),
        ]);


        $category1 = Category::create([
            'name'=>'code'
        ]);
        $category2 = Category::create([
            'name'=>'design'
        ]);
        $category3 = Category::create([
            'name'=>'ui ux'
        ]);


        $post1= Post::create([
            'title'=>'We relocated our office to a new designed garage',
            'description'=>'We relocated our office to a new designed garage',
            'content'=>"Worthy all math at of they these a to beings think and she in he I to off poetic not these little of big and one eminent should, sides behave. Readers the that her supplies such didn't on allpowerful shall we pass he a one shall in evening of then into and they're lively. A he ruining positives didn't the your brief the is alone motivator, housed hell at tone in being for in I has absolutely about she any head select lane.
Distant I rationale real in text, was chest the and copy pouring death, curiously, to once turned they place his that trying. At harmonics; Quite to understood. Is she to at the her deceleration to and the better of and funds together structure to object them. Fresh what and gain, around him created, hope which a associate the game, I turned that drawers. Little ever prepared themselves my well and lieutenantgeneral late, client the of get the client her it the where and he and that lazy by these one for very over cannot to and left declined, and makers.
A then low win variety own this every real all the salesman be I don't thin it if bed in anchors slowly he you have I young picture same the your own absolutely question everyday. But time harmonics; Was play infinity, how clarinet misleads appearance, my city both brilliant. Wasn't curiously, than psychological if himself in the and blind bathroom spirit, no gone in tones to me, than it partiality had anyone but in how country, global instead and it freshlybrewed way.
",
            'image'=>'posts/1.jpg',
            'category_id'=> $category1->id,
            'user_id'=> $user1->id,
        ]);
        $post2= Post::create([
            'title'=>'Top 5 brilliant content marketing strategies',
            'description'=>'We relocated our office to a new designed garage',
            'content'=>"Worthy all math at of they these a to beings think and she in he I to off poetic not these little of big and one eminent should, sides behave. Readers the that her supplies such didn't on allpowerful shall we pass he a one shall in evening of then into and they're lively. A he ruining positives didn't the your brief the is alone motivator, housed hell at tone in being for in I has absolutely about she any head select lane.
Distant I rationale real in text, was chest the and copy pouring death, curiously, to once turned they place his that trying. At harmonics; Quite to understood. Is she to at the her deceleration to and the better of and funds together structure to object them. Fresh what and gain, around him created, hope which a associate the game, I turned that drawers. Little ever prepared themselves my well and lieutenantgeneral late, client the of get the client her it the where and he and that lazy by these one for very over cannot to and left declined, and makers.
A then low win variety own this every real all the salesman be I don't thin it if bed in anchors slowly he you have I young picture same the your own absolutely question everyday. But time harmonics; Was play infinity, how clarinet misleads appearance, my city both brilliant. Wasn't curiously, than psychological if himself in the and blind bathroom spirit, no gone in tones to me, than it partiality had anyone but in how country, global instead and it freshlybrewed way.
",
            'image'=>'posts/2.jpg',
            'category_id'=> $category2->id,
            'user_id'=> $user1->id,
        ]);
        $post3= Post::create([
            'title'=>'Best practices for minimalist design with example',
            'description'=>'We relocated our office to a new designed garage',
            'content'=>"Worthy all math at of they these a to beings think and she in he I to off poetic not these little of big and one eminent should, sides behave. Readers the that her supplies such didn't on allpowerful shall we pass he a one shall in evening of then into and they're lively. A he ruining positives didn't the your brief the is alone motivator, housed hell at tone in being for in I has absolutely about she any head select lane.
Distant I rationale real in text, was chest the and copy pouring death, curiously, to once turned they place his that trying. At harmonics; Quite to understood. Is she to at the her deceleration to and the better of and funds together structure to object them. Fresh what and gain, around him created, hope which a associate the game, I turned that drawers. Little ever prepared themselves my well and lieutenantgeneral late, client the of get the client her it the where and he and that lazy by these one for very over cannot to and left declined, and makers.
A then low win variety own this every real all the salesman be I don't thin it if bed in anchors slowly he you have I young picture same the your own absolutely question everyday. But time harmonics; Was play infinity, how clarinet misleads appearance, my city both brilliant. Wasn't curiously, than psychological if himself in the and blind bathroom spirit, no gone in tones to me, than it partiality had anyone but in how country, global instead and it freshlybrewed way.
",
            'image'=>'posts/3.jpg',
            'category_id'=> $category3->id,
            'user_id'=> $user2->id,
        ]);
        $post4= Post::create([
            'title'=>'Congratulate and thank to Maryam for joining our team',
            'description'=>'We relocated our office to a new designed garage',
            'content'=>"Worthy all math at of they these a to beings think and she in he I to off poetic not these little of big and one eminent should, sides behave. Readers the that her supplies such didn't on allpowerful shall we pass he a one shall in evening of then into and they're lively. A he ruining positives didn't the your brief the is alone motivator, housed hell at tone in being for in I has absolutely about she any head select lane.
Distant I rationale real in text, was chest the and copy pouring death, curiously, to once turned they place his that trying. At harmonics; Quite to understood. Is she to at the her deceleration to and the better of and funds together structure to object them. Fresh what and gain, around him created, hope which a associate the game, I turned that drawers. Little ever prepared themselves my well and lieutenantgeneral late, client the of get the client her it the where and he and that lazy by these one for very over cannot to and left declined, and makers.
A then low win variety own this every real all the salesman be I don't thin it if bed in anchors slowly he you have I young picture same the your own absolutely question everyday. But time harmonics; Was play infinity, how clarinet misleads appearance, my city both brilliant. Wasn't curiously, than psychological if himself in the and blind bathroom spirit, no gone in tones to me, than it partiality had anyone but in how country, global instead and it freshlybrewed way.
",
            'image'=>'posts/4.jpg',
            'category_id'=> $category2->id,
            'user_id'=> $user1->id,
        ]);


        $tag1 = Tag::create([
            'name'=>'laravel'
        ]);
        $tag2 = Tag::create([
            'name'=>'gatsby'
        ]);
        $tag3 = Tag::create([
            'name'=>'wordpress'
        ]);
        $tag4 = Tag::create([
            'name'=>'shopify'
        ]);


        $post1->tags()->attach([$tag1->id,$tag2->id]);
        $post2->tags()->attach([$tag3->id,$tag2->id]);
        $post3->tags()->attach([$tag2->id,$tag2->id]);
        $post4->tags()->attach([$tag4->id,$tag2->id]);

    }
}
