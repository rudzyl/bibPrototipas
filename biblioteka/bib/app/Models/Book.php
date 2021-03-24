<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    public function bookAuthor()  //funkcijos vardas nieko nereiskia
    {
        return $this->belongsTo(Author::class, 'author_id', 'id');
    }
 
}
