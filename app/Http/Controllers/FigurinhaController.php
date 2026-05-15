<?php

namespace App\Http\Controllers;

use App\Models\Figurinha;
use Illuminate\Http\Request;

class FigurinhaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $figurinhas = Figurinha::orderBy('numero')->get();

        return view('figurinhas.index', compact('figurinhas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('figurinhas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'pais' => 'required|string|max:100',
            'numero' => 'required|integer|unique:figurinhas,numero',
            'time' => 'required|string|max:100',
            'imagem' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('imagem')) {
            $path = $request->file('imagem')->store('figurinhas', 'public');
            $validated['imagem'] = $path;
        }

        Figurinha::create($validated);

        return redirect()->route('figurinhas.index')->with('success', 'Figurinha cadastrada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $figurinha = Figurinha::findOrFail($id);
        return view('figurinhas.edit', compact('figurinha'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $figurinha = Figurinha::findOrFail($id);

        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'pais' => 'required|string|max:100',
            'numero' => 'required|integer|unique:figurinhas,numero,' . $id,
            'time' => 'required|string|max:100',
            'imagem' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('imagem')) {
            if ($figurinha->imagem) {
                \Storage::disk('public')->delete($figurinha->imagem);
            }
            $path = $request->file('imagem')->store('figurinhas', 'public');
            $validated['imagem'] = $path;
        }

        $figurinha->update($validated);

        return redirect()->route('figurinhas.index')->with('success', 'Figurinha atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $figurinha = Figurinha::findOrFail($id);

        if ($figurinha->imagem) {
            \Storage::disk('public')->delete($figurinha->imagem);
        }

        $figurinha->delete();

        return redirect()->route('figurinhas.index')->with('success', 'Figurinha excluída com sucesso!');
    }
}
