<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\FuncCall;

class TodoController extends Controller
{
    public function index()
    {
        $todo = Todo::where('is_completed', false)->orderBy('created_at', 'desc')->get();
        return view('todo.index', compact('todo'));
    }

    public function create()
    {
        return view('todo.create');
    }

    public function store(Request $request)
    {
        try {
            $todo = new Todo();
            $todo->task = $request->task;
            $todo->is_completed = false;
            $todo->user_id = Auth::user()->id;
            $todo->save();

            return redirect()->route('todo.index');
        } catch (Exception $e) {
            return redirect()->back()->withErrors('message', $e->getMessage());
        }
    }

    public function complete(Request $request) {
        $query = Todo::find($request->id);

        $query->is_completed = true;
        $query->save();

        return redirect()->back();
    }
}
