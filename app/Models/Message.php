<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Message extends Model

{
    protected $table = "messages";
    protected $guarded = false ;
    use HasFactory;
    use SoftDeletes;

    public function category()
    {
        return $this->belongsTo(Category::class, "category_id", "id");
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, "message_tags", "message_id", "tag_id");
    }
}
