<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Http\RedirectResponse;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // $notes = Note::all();

        // $notes = Note::where('user_id', auth()->id())->get();

        $title = "All Nots";

        $notes = Note::whereUserId(auth()->id())->latest()->paginate(5);
        return view('notes.index',compact(['notes','title']));
       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $title = "Create Note";
        return view('notes.create',compact('title'));
    }
    public function login()
    {

        return view('auth.login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request):RedirectResponse
    {

        //validation
        $validated = $request->validate([
            'title'=> 'required|string|min:5|max:255|unique:notes',
            'content'=> 'required|string|min:10','max:255',
        ]);

        $request->user()->notes()->create($validated);

        return redirect(route('notes.index'))
        ->with('success','Note Create Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Note $note)
    {

        $this->authorize('view', $note);
        $title = "Show Note";
       return view('notes.show',compact(['note','title']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Note $note)
    {
        $this->authorize('update',$note);
        $title = 'Edit Note';
        return view('notes.edit',compact(['note','title']));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Note $note)
    {
        $this->authorize('update', $note);
    
        $validated = $request->validate([
            'title' => ['required', 'string', 'min:5', 'max:255', Rule::unique('notes')->ignore($note->id)],
            'content' => ['required', 'string', 'min:10', 'max:255'], // Fixed syntax for content validation
        ]);
    
        $note->update($validated);
    
        return redirect(route('notes.index'))->with('success','Note Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            // Find the note by its id and delete it
            $note = Note::findOrFail($id);

            $note->delete();
    
            return redirect()->route('notes.index')->with('success', 'Note deleted successfully!');
        } catch (\Exception $e) {
           
            return redirect()->route('notes.index')->with('error', 'Failed to delete note.');
        }
    }
}
