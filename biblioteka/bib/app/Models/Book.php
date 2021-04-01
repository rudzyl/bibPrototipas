<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Author;
use App\Models\Publisher;

class Book extends Model
{
    use HasFactory;

    public function bookAuthor()  //funkcijos vardas nieko nereiskia
    {
        return $this->belongsTo(Author::class, 'author_id', 'id');
    }
    public function bookPublisher()  //funkcijos vardas nieko nereiskia
    {
        return $this->belongsTo(Publisher::class, 'publisher_id', 'id');
    }
 
}
