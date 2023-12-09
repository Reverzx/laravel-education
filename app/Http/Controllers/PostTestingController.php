<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PostTesting;

class PostTestingController extends Controller
{
    public function index() {
        $Testing=PostTesting::all();
        return view("My_first_view", compact("Testing"));
}

    public function create() {
        $PostTesting =[
            [
                "title"=> "Пост через VS code",
                "image"=> "https://get.pxhere.com/photo/man-person-girl-woman-camera-photography-portrait-spring-red-lens-color-autumn-canon-romance-season-taking-photo-photograph-beauty-emotion-photo-shoot-portrait-photography-1169775.jpg",
                "description"=> "Оприсание этого пост",
                "count_like"=> 43,
                "is_published"=> 1,
            ],
            [
                "title"=> "Post for VS code",
                "image"=> "om/photo/man-person-girl-woman-camera-photography-portrait-spring-red-lens-color-autumn-canon-romance-season-taking-photo-photograph-beauty-emotion-photo-shoot-portrait-photography-1169775.jpg",
                "description"=> "description post for vs code",
                "count_like"=> 12,
                "is_published"=> 0,
            ],
        ];
        $Postsd =[
            [
                "title"=> "asdadsad",
                "image"=> "as",
                "description"=> "Оп",
                "count_like"=> 99000,
                "is_published"=> 1,
            ]
        ];
        foreach ($PostTesting as $key) {
            PostTesting::create($key);
        }
        dd("created");


}

    public function update() {

        $post = PostTesting::find(6);
        $post->update([
            "title"=> "Пост проапдейченый через VS code",
        ]);
        dd("обновил");
    }

    public function delete() {
        //PostTesting::withTrashed()->find(6)->restore();
        if (PostTesting::find(6) == null) {
            PostTesting::withTrashed()->find(6)->restore();
            dd("restore 6 posttesting");
        }
        else {
            PostTesting::find(6)->delete();
            dd("delte 6 posttesting");
        }
    }


    public function firstOrCreate() {

        PostTesting::firstOrCreate(
            ['title' => 'Post for VS code firstOrCreate'],
            [
                "title"=> "Post for VS code firstOrCreate",
                "image"=> "Zoom firstOrCreate",
                "description"=> "description post for vs code firstOrCreate",
                "count_like"=> 1200,
                "is_published"=> 1,
            ],
        );
        dd("firstOrCreate");
    }


}
