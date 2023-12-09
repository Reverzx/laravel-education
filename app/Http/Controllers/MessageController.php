<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Message;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Models\MessageTag;

class MessageController extends Controller
{
    public function index(){


        $message=Message::all();
        return view("message.index", compact("message"));

    }

    public function create(){

        $categories=Category::all();
        $tags=Tag::all();
        return view("message.create", compact("categories", "tags"));
    }

    public function store() {

        $data = request()->validate([
            "title"=>"required|string",
            "content"=>"string",
            #"image"=>"Image",
            "category_id"=>"",
            "tags"=>""
        ]);
        $tags = $data["tags"];
        unset($data["tags"]);


        $message = Message::create($data);

        $message->tags()->attach($tags, ['created_at' => new \DateTime('now')]);

        return redirect()->route('message.index');
    }

    public function show(Message $message) {

        return view("message.show", compact("message"));
    }

    public function edit(Message $message) {

        $categories=Category::all();
        $tags=Tag::all();
        return view("message.edit", compact ("message", "categories", "tags"));
    }


    public function update(Message $message) {

        $data = request()->validate([
            "title"=>"string",
            "content"=>"string",
            #"image"=>"Image",
            "category_id"=>"",
            "tags"=>""
        ]);

        $tags = $data["tags"];
        unset($data["tags"]);
        #dd($tags, $data);
        $message->update($data);
        $message->tags()->sync($tags);

        return redirect()->route('message.index');
    }

    public function destroy(Message $message) {

        $message->delete();
        return redirect()->route('message.index');
    }

}
