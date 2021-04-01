<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Publisher extends Model
{
    use HasFactory;

    public function publisherBooksList()
    {
        return $this->hasMany('App\Models\Book', 'publisher_id', 'id');
    }

    // public function edit(Request $request) {

    //     $this->name = $request->author_name;
    //     $this->surname = $request->author_surname;
    //     $this->save();
    // }
    public static function new() {

     return new self;

    }

    public function refreshAndSave(Request $request) {
        $this->title = $request->publisher_title;
         $this->save();
         return $this;
    }
}
