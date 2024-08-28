<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EnvironmentData;

class EnvironmentDataController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum'); // Menambahkan autentikasi ke semua endpoint
    }

    public function index()
    {
        return response()->json(EnvironmentData::all(), 200);
    }

    public function show($id)
    {
        $data = EnvironmentData::find($id);
        if (!$data) {
            return response()->json(['message' => 'Data not found'], 404);
        }
        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
       // Validasi input
    $request->validate([
        'sensor_name' => 'required|string|max:255',
        'pollution_level' => 'required|numeric',
        'temperature' => 'required|numeric',
        'water_quality' => 'required|numeric',
    ]);

    // Simpan data ke database
    $environmentData = EnvironmentData::create([
        'sensor_name' => $request->sensor_name,
        'pollution_level' => $request->pollution_level,
        'temperature' => $request->temperature,
        'water_quality' => $request->water_quality,
    ]);

    // Kembalikan respons
    return response()->json($environmentData, 201);
    }

    public function update(Request $request, $id)
    {
        $data = EnvironmentData::find($id);
        if (!$data) {
            return response()->json(['message' => 'Data not found'], 404);
        }

        $validatedData = $request->validate([
            'sensor_name' => 'required|string|max:255',
            'pollution_level' => 'nullable|numeric',
            'temperature' => 'nullable|numeric',
            'water_quality' => 'nullable|numeric',
        ]);

        $data->update($validatedData);
        return response()->json($data, 200);
    }

    public function destroy($id)
    {
        $data = EnvironmentData::find($id);
        if (!$data) {
            return response()->json(['message' => 'Data not found'], 404);
        }

        $data->delete();
        return response()->json(null, 204);
    }
}
