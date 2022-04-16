<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;


class Post extends Eloquent
{
    use HasFactory;

    protected $connection = 'mongodb';
    protected $guarded = [];
    //public $primaryKey = 'id_post';
    //protected $fillable = [
    //    'title',
    //    'content',
    //    'file',
    //];

}
