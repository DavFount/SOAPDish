<?php

namespace App\Http\Controllers;

use App\Models\Study;
use Illuminate\Http\Request;

class StudiesController extends Controller
{
    public function index()
    {
        return view('studies.index', [
            'studies' => Study::latest()->where('public', true)->paginate()
        ]);
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
    }

    public function show(Study $study)
    {
    }

    public function edit(Study $study)
    {
    }

    public function update(Request $request, Study $study)
    {
    }

    public function destroy(Study $study)
    {
    }
}
