<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
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

    $posts = Post::all();
    // ddd($posts);

    return view('posts',[
        'posts'=> Post::all(),

    ]);
});


Route::get('posts/{post}',function($slug){

    //表示する投稿を$slugで特定し、postと呼ばれるviewにパスする
    $post = Post::find($slug);

    return view('post',[
        'post'=>$post,
    ]);

})->where('post','[A-z_\-]+');