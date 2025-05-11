<?php
namespace App\Http\Controllers;

use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function index()
    {
        $lessons = Lesson::all();
        return view('lessons.index', compact('lessons'));
    }
    

    public function create()
    {
        $lessons = Lesson::all(); // o lo que necesites
        return view('lessons.create', compact('lessons'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'level' => 'required|string',
        ]);

        Lesson::create($request->all());

        return redirect()->route('lessons.index')->with('success', 'Lección creada');
    }

    public function show(Lesson $lesson)
    {
        return view('lessons.show', compact('lesson'));
    }

    public function edit(Lesson $lesson)
    {
        return view('lessons.edit', compact('lesson'));
    }

    public function update(Request $request, Lesson $lesson)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'level' => 'required|string',
        ]);

        $lesson->update($request->all());

        return redirect()->route('lessons.index')->with('success', 'Lección actualizada');
    }

    public function destroy(Lesson $lesson)
    {
        $lesson->delete();
        return redirect()->route('lessons.index')->with('success', 'Lección eliminada');
    }
}
