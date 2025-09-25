<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Import semua model yang dibutuhkan
use App\Models\Demografi;
use App\Models\DemografiDetail;
use App\Models\Apbdes;
use App\Models\ApbdesDetail;
use App\Models\Stunting;
use App\Models\Bansos;
use App\Models\PenerimaBansos;
use App\Models\Idm;
use App\Models\Sdg;

class InfografisController extends Controller
{
    public function penduduk()
    {
        $tahunTerbaru = Demografi::max('tahun') ?? now()->year;
        $demografi = Demografi::where('tahun', $tahunTerbaru)->first();
        $demografiDetail = DemografiDetail::where('tahun', $tahunTerbaru)->get();
        return view('infografis.penduduk', compact('demografi', 'demografiDetail'));
    }

    public function apbdes()
    {
        $tahunTerbaru = Apbdes::max('tahun') ?? now()->year;
        $apbdes = Apbdes::where('tahun', $tahunTerbaru)->first();
        $apbdesDetail = $apbdes ? ApbdesDetail::where('apbdes_id', $apbdes->id)->get() : collect();
        return view('infografis.apbdes', compact('apbdes', 'apbdesDetail'));
    }

    public function stunting()
    {
        $tahunTerbaru = Stunting::max('tahun') ?? now()->year;
        $stunting = Stunting::where('tahun', $tahunTerbaru)->first();
        return view('infografis.stunting', compact('stunting'));
    }

    public function bansos(Request $request)
    {
        $tahunTerbaru = Bansos::max('tahun') ?? now()->year;
        $bansos = Bansos::where('tahun', $tahunTerbaru)->get();

        $hasilCariBansos = null;
        if ($request->filled('nik')) {
            $hasilCariBansos = PenerimaBansos::where('nik', $request->nik)->first();
        }

        return view('infografis.bansos', compact('bansos', 'hasilCariBansos'));
    }

    public function idm()
    {
        $tahunTerbaru = Idm::max('tahun') ?? now()->year;
        $idm = Idm::where('tahun', $tahunTerbaru)->first();
        return view('infografis.idm', compact('idm'));
    }

    public function sdgs()
    {
        $tahunTerbaru = Sdg::max('tahun') ?? now()->year;
        $sdg = Sdg::where('tahun', $tahunTerbaru)->first();
        return view('infografis.sdgs', compact('sdg'));
    }
}
