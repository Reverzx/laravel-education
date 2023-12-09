<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PostTesting extends Model
{
    protected $table = "post_testings";
    protected $guarded = [] ;
    use HasFactory;
    use SoftDeletes;
}
