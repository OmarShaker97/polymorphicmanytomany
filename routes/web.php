<?php

use App\Post;
use App\Tag;
use App\Video;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/create', function(){

    $post = Post::create(['name'=>'My First Post']);
    
    $tag1 = Tag::findOrFail(1);

    $post->tags()->save($tag1);

    $video = Video::create(['name'=>'video.mov']);

    $tag2 = Tag::findOrFail(2);

    $video->tags()->save($tag2);

});


Route::get('/read', function(){

    $post = Post::findOrFail(2);

    //echo $post->tags;

    foreach($post->tags as $tag){
        echo $tag;
    }

});

Route::get('/update', function(){

    $post = Post::findOrFail(2);

    foreach($post->tags as $tag){
        return $tag->whereName('PHP')->update(['name'=>'Updated PHP']);
    }

});


Route::get('/delete', function(){

    $post = Post::findOrFail(2);

    foreach($post->tags as $tag){
        return $tag->whereId('2')->delete();
    }

});