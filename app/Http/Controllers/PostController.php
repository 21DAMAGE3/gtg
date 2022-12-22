<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $posts = Post::where('content','true')->get();


        dump($posts->content);



    }
    public function create(){
        $postsArr=[
          [
              'title'=>'title1',
              'content'=>'something',
              'image'=>'imgae.png',
              'likes'=>20,
              'is_published'=>1,
          ],
            [
                'title'=>'title2',
                'content'=>'something23',
                'image'=>'imgae2.png',
                'likes'=>24,
                'is_published'=>1,
            ]
        ];
        foreach ($postsArr as $item){

            Post::create($item);
        }

        dd('created');

    }
    function update(){
        $post = Post::find(6);
        $post->update([
            'title'=>'updatedss',
            'content'=>'updated',
            'image'=>'updated',
            'likes'=>244,
            'is_published'=>0,
        ]);
        echo $post;
    }
    function delete(){
        $post = Post::withTrashed()->find(4);

            $post->restore();
            echo ('Пост восстановлен!');
            echo($post);


    }

}
