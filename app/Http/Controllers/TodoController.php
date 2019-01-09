<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class TodoController extends Controller
{
    public function store(Request $request)
    {
        $todo = TODO::create([
            'todo'=> $request->todo,
            'user_id'=> auth()->id(),
            'completed'=> 0
        ]);
    }

    public function delete($id)
    {
        $todo = Todo::findOrFail($id);

        $todo->delete();
    }

    public function update($id)
    {
        $todo = Todo::findOrFail($id);

        if($todo->completed == 0){
            $todo->completed = 1 ;
        }
        else{
            $todo->completed = 0 ;
        }

        $todo->update();
    }
}
