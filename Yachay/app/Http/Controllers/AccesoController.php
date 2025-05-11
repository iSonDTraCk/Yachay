<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumno;
use App\Models\Profesor;

class AccesoController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function login(Request $request)
    {
        $request->validate([
            'dni' => 'required|digits:8',
            'rol' => 'required|in:alumno,profesor',
        ]);

        if ($request->rol === 'alumno') {
            $user = Alumno::where('dni', $request->dni)->first();
            if ($user) {
                return redirect()->route('alumno.home');
            }
        } else {
            $user = Profesor::where('dni', $request->dni)->first();
            if ($user) {
                return redirect()->route('profesor.home');
            }
        }

        return back()->with('error', 'DNI no encontrado. Puedes crear una cuenta.');
    }

    public function registro($rol)
    {
        if (!in_array($rol, ['profesor', 'alumno'])) {
            abort(404);
        }

        return view("registro.$rol");
    }

    public function registrarProfesor(Request $request)
    {
        $request->validate([
            'dni' => 'required|digits:8|unique:profesors,dni',
            'nombre' => 'required|string|max:255',
        ]);

        Profesor::create($request->only('dni', 'nombre'));

        return redirect()->route('acceso.index')->with('success', 'Profesor registrado correctamente');
    }

    public function registrarAlumno(Request $request)
    {
        $request->validate([
            'dni' => 'required|digits:8|unique:alumnos,dni',
            'nombre' => 'required|string|max:255',
        ]);

        Alumno::create($request->only('dni', 'nombre'));

        return redirect()->route('acceso.index')->with('success', 'Alumno registrado correctamente');
    }
}
