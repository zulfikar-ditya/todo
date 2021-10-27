<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class todoController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $data = Todo::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(20);
        } else {
            $data = [];
        }
        return view('frontend.index', compact('data'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'todo' => 'required|max:100',
        ]);
        $model = new Todo();
        $model->todo = $request->todo;
        $model->user_id = Auth::user()->id;
        try {
            $model->save();
        } catch (\Exception $e) {
            return redirect()->route('index')->with([
                'success' => false,
                'message' => 'An Error Happen, ' . $e->getMessage()
            ]);
        }
        return redirect()->route('index')->with([
            'success' => true,
            'message' => 'Yeay!!! Success Inserting New Todo'
        ]);
    }

    public function destroy($id)
    {
        $data = Todo::findOrFail($id);
        if ($data->user_id != Auth::user()->id) return abort(404);
        try {
            $data->delete();
        } catch (\Exception $e) {
            return redirect()->route('index')->with([
                'success' => false,
                'message' => 'An Error Happen, ' . $e->getMessage()
            ]);
        }
        return redirect()->route('index')->with([
            'success' => true,
            'message' => 'Yeay!!! Delete Todo Data'
        ]);
    }
}
