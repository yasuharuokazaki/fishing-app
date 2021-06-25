<?php

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

use function PHPSTORM_META\map;
use Symfony\Component\Yaml\Inline;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

use Spatie\YamlFrontMatter\YamlFrontMatter;
use Symfony\Component\Routing\Loader\YamlFileLoader;

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
    // echo phpinfo();
    // DB::listen(function($query){
    //     logger($query->sql,$query->bindings);
    // });

      return view('posts',[
           'posts'=> Post::with('category')->get(),
        ]);
});

//変数postをfunctionに渡し、Postインスタンスとバインドしている
Route::get('posts/{post:slug}',function(Post $post){

    //$post:$slugで、Postから取得するデータのidを指定
    //何も指定せず$postのままだと、idで対象を探しに行く
        // ddd($post);
    return view('post',[
        'post'=>$post,
    ]);

});

Route::get('categories/{category:slug}',function(Category $category){
    // ddd($category);
    return view('posts',[ 
        'posts'=> $category->posts,
    ]);
});