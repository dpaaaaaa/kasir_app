<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardPetugasController extends Controller
{
    /**
     * Tampilkan halaman dashboard untuk petugas.
     */
    public function index()
    {
        return view('petugas.dashboard');
    }
}
