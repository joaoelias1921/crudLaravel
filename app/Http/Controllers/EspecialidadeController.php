<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Especialidade;

class EspecialidadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $especialidades = Especialidade::all();
        return view('especialidades.index', compact('especialidades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('especialidades.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nome_esp'      =>      'required',
            'sigla_esp'     =>      'required',
            'obs_esp'       =>      'required'
        ]);
        $especialidade = Especialidade::create($validateData);

        return redirect('/especialidades')->with('success','Dados adicionados com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $especialidade = Especialidade::findOrFail($id);
        return view('especialidades.show', compact('especialidade'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $especialidade = Especialidade::findOrFail($id);
        return view('especialidades.edit', compact('especialidade'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'nome_esp'      =>      'required',
            'sigla_esp'     =>      'required',
            'obs_esp'       =>      'required'
        ]);
        Especialidade::whereId($id)->update($validateData);

        return redirect('/especialidades')->with('success', 'Dados atualizados com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // localizando o objeto que será excluído
        $especialidade = Especialidade::findOrFail($id);
        // realizando a exclusão
        $especialidade->delete();
        // redirecionando para o diretório raiz (index)
        return redirect('/especialidades')->with('success', 'Dados removidos com sucesso!');
    }
}