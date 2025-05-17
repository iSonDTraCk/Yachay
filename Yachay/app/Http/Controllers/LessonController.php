<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LessonController extends Controller
{
    /**
     * Muestra todas las lecciones.
     * Tanto alumnos como profesores las ven aquí;
     * la vista decide qué acciones mostrar según el rol.
     */
    public function index()
    {
        $lessons = Lesson::all();
        return view('lessons.index', compact('lessons'));
    }

    /**
     * Muestra el formulario de creación.
     * Solo accesible para profesores.
     */
    public function create()
    {
        if (Session::get('rol') !== 'profesor') {
            abort(403, 'No autorizado');
        }

        return view('lessons.create');
    }

    /**
     * Almacena una nueva lección.
     * Solo accesible para profesores.
     */
    public function store(Request $request)
    {
        if (Session::get('rol') !== 'profesor') {
            abort(403, 'No autorizado');
        }

        $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        Lesson::create($request->only('title', 'content'));

        return redirect()
            ->route('lessons.index')
            ->with('success', 'Lección creada con éxito.');
    }

    /**
     * Muestra una lección individual.
     * Ambos roles pueden verla; la vista ajusta las acciones.
     */
    public function show(Lesson $lesson)
    {
        return view('lessons.show', compact('lesson'));
    }

    /**
     * Muestra el formulario de edición.
     * Solo accesible para profesores.
     */
    public function edit(Lesson $lesson)
    {
        if (Session::get('rol') !== 'profesor') {
            abort(403, 'No autorizado');
        }

        return view('lessons.edit', compact('lesson'));
    }

    /**
     * Actualiza la lección.
     * Solo accesible para profesores.
     */
    public function update(Request $request, Lesson $lesson)
    {
        if (Session::get('rol') !== 'profesor') {
            abort(403, 'No autorizado');
        }

        $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $lesson->update($request->only('title', 'content'));

        return redirect()
            ->route('lessons.index')
            ->with('success', 'Lección actualizada con éxito.');
    }

    /**
     * Elimina la lección.
     * Solo accesible para profesores.
     */
    public function destroy(Lesson $lesson)
    {
        if (Session::get('rol') !== 'profesor') {
            abort(403, 'No autorizado');
        }

        $lesson->delete();

        return redirect()
            ->route('lessons.index')
            ->with('success', 'Lección eliminada con éxito.');
    }
}
