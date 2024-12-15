<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class CompletedTaskController extends Controller
{
    public function index(){
        $todo = Todo::where('is_completed', true)->orderBy('created_at', 'desc')->get();
        return view('complete.index', compact('todo'));
    }

    public function unComplete(Request $request) {
        $query = Todo::find($request->id);

        $query->is_completed = false;
        $query->save();

        return redirect()->back();
    }
}
