<?php

namespace App\Http\Controllers;

use App\Models\TitikPenting;
use Illuminate\Http\Request;

class PetaController extends Controller
{
    public function index()
    {
        // Ambil semua data titik penting
        $titikPenting = TitikPenting::all();
        
        // Kirim data ke view
        return view('peta-desa', ['locations' => $titikPenting]);
    }
}