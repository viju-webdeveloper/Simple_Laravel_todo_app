<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    //
    public function index()
    {
        
        $todos = Todo::where('user_id',auth()->user()->id)->simplepaginate(3); // Fetch all todos from the database
        return view('welcome', compact('todos'));
    }

    public function create()
    {
        return view('todo.create');
    }

    public function store(Request $request)
    {
        $valdatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'due_date' => 'required|date',
        ]);

        $todo = new Todo();
        $todo->title = $valdatedData['title'];
        $todo->description = $valdatedData['description'];
        $todo->due_date = $valdatedData['due_date'];
        $todo->user_id = auth()->id(); 
        $todo->save();

        return redirect('/');
    }

    public function edit($id)
    {
        $todo = Todo::findOrFail($id);
        return view('todo.edit', compact('todo'));
    }

    public function update(Request $request, $id)
    {
        try{
            $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'due_date' => 'required|date',
            'status' => 'required', // Assuming status can be 'pending' or 'completed'
         ]);

         $todo = Todo::findOrFail($id);
         $todo->title = $validatedData['title'];
         $todo->description = $validatedData['description'];
         $todo->due_date = $validatedData['due_date'];
         $todo->status = $validatedData['status'];
         $todo->save();

         return redirect('/');
        }catch(\Exception $e){
            dd($e->getMessage());
        }
        
    }

    public function delete($id)
    {
        $todo = Todo::findOrFail($id);
        $todo->delete();
        return redirect('/');
    }
}
