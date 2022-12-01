<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $incrementing = false;
    public $table = "files";

    public $fillable = [
        "name",
        "url",
        "path",
        "author_id",
    ];
}
