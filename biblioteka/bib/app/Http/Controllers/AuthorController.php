<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Validator;

class AuthorController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $authors = $request->sort ? Author::orderBy('surname')->get() : Author::all();
        if ('name' == $request->sort) {
            $authors = Author::orderBy('name')->get();
        }
        else if ('surname' == $request->sort) {
            $authors = Author::orderBy('surname')->get();
        } 
        else {
            $authors = Author::all();
        }
    //    $authors = Author::all();
        // $authors = Author::orderBy('surname')->get();

       return view('author.index', ['authors' => $authors]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('author.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(), //argumentas nr 1
        [
            'author_name' => ['required', 'min:3', 'max:64'], //argumentas nr 2
            'author_surname' => ['required', 'min:3', 'max:64'],
        ],
          [
          'author_surname.required' => 'ideti pavarde', //argumentas nr 3
          'author_surname.min' => 'per trumpa pavarde'
          ]
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }
        // Author::create($request);
        Author::new()->refreshAndSave($request);
        return redirect()->
        route('author.index')->with('success_message', 'Sekmingai įrašytas.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author)
    {
        return view('author.edit', ['author' => $author]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Author $author)
    {
        $validator = Validator::make(
            $request->all(), //argumentas nr 1
        [
            'author_name' => ['required', 'min:3', 'max:64'], //argumentas nr 2
            'author_surname' => ['required', 'min:3', 'max:64'],
        ],
          [
          'author_surname.required' => 'ideti pavarde', //argumentas nr 3
          'author_surname.min' => 'per trumpa pavarde'
          ]
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }
        // $author->edit($request);
        $author->refreshAndSave($request);
        return redirect()->route('author.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author)
    {
        if($author->authorBooks->count()){
            return redirect()->back()->with('info_message', 'Autorius turi knygu, negalima istrinti.');
        }
        $author->delete();
        return redirect()->route('author.index')->with('info_message', 'Sekmingai ištrintas.');
    }
}
