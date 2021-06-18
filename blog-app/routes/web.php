<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;
use App\Models\Post;
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

    $documents=[];

    $files=File::files(resource_path("posts"));

    foreach($files as $file){
        $documents[]=YamlFrontMatter::parseFile($file);
    }

    return view('posts',[
      'posts'=> $documents,
    ]);
});


Route::get('posts/{post}',function($slug){

    //表示する投稿を$slugで特定し、postと呼ばれるviewにパスする
    $post = Post::find($slug);

    return view('post',[
        'post'=>$post,
    ]);

})->where('post','[A-z_\-]+');