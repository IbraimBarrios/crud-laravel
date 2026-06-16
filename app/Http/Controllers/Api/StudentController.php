<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();

        return response()->json(['data' => $students]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:5|max:100',
            'age' => 'required|integer|min:1'
        ]);

        if($validator->fails()){
            $data = [
                'message' => 'Error en la validación de los datos',
                'errors' => $validator->errors(),
            ];

            return response()->json($data, 422);
        }

        $student = Student::create([
            'name' => $request->name,
            'age' => $request->age
        ]);

        if(!$student){
            return response()->json(['message' => 'Error al crear el estudiante'], 500);
        }

        return response()->json([
            'message' => 'Estudiante creado',
            'data' => $student,
        ], 201);
    }

    public function show(string $id){
        $student = Student::find($id);

        if (!$student) {
            return response()->json(['message' => 'Estudiante no encontrado'], 404);
        }

        return response()->json([
            'message' => 'Alumno recuperado con éxito',
            'data' => $student
        ], 200);
    }

    public function update(Request $request, string $id)
    {
        $student = Student::find($id);

        if (!$student) {
            return response()->json(['message' => 'Estudiante no encontrado'], 404);
        }

        // Ejemplo 1: Update
        /* $validated = $request->validate([
            'name' => 'required|string|min:5|max:100',
            'age' => 'required|integer|min:1',
        ]);

        $student->update($validated);*/

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:5|max:100',
            'age' => 'required|integer|min:1'
        ]);

        if($validator->fails()){
            $data = [
                'message' => 'Error en la validación de los datos',
                'errors' => $validator->errors(),
            ];

            return response()->json($data, 422);
        }

        $student->update($validator->validated());

        return response()->json([
            'message' => 'Estudiante actualizado',
            'data' => $student,
        ], 200);
    }

    public function destroy(string $id)
    {
        $student = Student::find($id);

        if (!$student) {
            $data = [
                'message' => 'Estudiante no encontrado',
                'status' => 404
            ];

            return response()->json($data, 404);
        }

        $student->delete();

        return response()->json(['message' => 'Estudiante eliminado'], 200);
    }
}
