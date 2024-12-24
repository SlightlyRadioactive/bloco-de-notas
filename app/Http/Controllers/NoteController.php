<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'=> 'required|string|max:255',
            'content'=> 'string',
            'categoryId'=> 'numeric|gt:0'
        ]);

        Note::create($data);

        return to_route('categories.index')->with('message','Nota foi gravada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Note $note)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Note $note)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Note $note)
    {
        $data = $request->validate([
            'title'=> 'required|string|max:255',
            'content'=> 'string',
            'categoryID' => 'numeric|gt:0'
        ]);

        $note->update($data);

        return to_route('categories.index')->with('message','Nota foi atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note)
    {
        $note->delete();
        return to_route('categories.index')->with('message','Nota removida com sucesso!');
    }
}