<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use Illuminate\Http\Request;
use Validator;

class PublisherController extends Controller
{
   
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $authors = $request->sort ? Author::orderBy('surname')->get() : Author::all();
        if ('title' == $request->sort) {
            $publishers = Publisher::orderBy('title')->get();
        }
        else {
            $publishers = Publisher::all();
        }
    //    $authors = Author::all();
        // $authors = Author::orderBy('surname')->get();

       return view('publisher.index', ['publishers' => $publishers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('publisher.create');
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
            'publisher_title' => ['required', 'min:3', 'max:64'], //argumentas nr 2
        ]
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }
        Publisher::new()->refreshAndSave($request);
        return redirect()->
        route('publisher.index')->with('success_message', 'Sekmingai įrašytas.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Publisher  $author
     * @return \Illuminate\Http\Response
     */
    public function show(Publisher $publisher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Publisher  $author
     * @return \Illuminate\Http\Response
     */
    public function edit(Publisher $publisher)
    {
        return view('publisher.edit', ['publisher' => $publisher]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Publisher  $author
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Publisher $publisher)
    {
        $validator = Validator::make(
            $request->all(), //argumentas nr 1
        [
            'publisher_title' => ['required', 'min:3', 'max:64'] //argumentas nr 2
        ]
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }
        // $author->edit($request);
        $publisher->refreshAndSave($request);
        return redirect()->route('publisher.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Publisher  $Publisher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Publisher $publisher)
    {
        if($publisher->publisherBooksList->count()){
            return redirect()->back()->with('info_message', 'Leidejas turi knygu, negalima istrinti.');
        }
        $publisher->delete();
        return redirect()->route('publisher.index')->with('info_message', 'Sekmingai ištrintas.');
    }
}
