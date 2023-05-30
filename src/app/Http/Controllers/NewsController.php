<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\User;
use GuzzleHttp\Client;
class NewsController extends Controller

{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = News::all();
        return $news;
       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        $new = News::create($request->all());

        return $new;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);
        $news = News::find($id);
        $news->update($request->all());
        // return $request->all();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // return $id;
        $news = News::find($id);
        if ($news) {
            $result = $news->delete();
          }
          return $result;
    }


}
