<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Consulta;
use App\Medico;
use App\Paciente;

class ConsultaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $consultas = Consulta::all();
        return view('consultas.index', compact('consultas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Obtendo todos os pacientes
        $pacientes = Paciente::pluck('nome', 'id');
        //Obtendo todos os médicos
        $medicos = Medico::pluck('nome', 'id');
        //dd($pacientes);
        //dd($medicos);
        return view ('consultas.create', compact('pacientes', 'medicos'));
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
            'paciente_id'       =>      'required|max:35',
            'medico_id'         =>      'required|max:35',
            'data'              =>      'required',
            'hora'              =>      'required'
        ]);
        $consulta = Consulta::create($validateData);

        return redirect('/consultas')->with('success','Dados adicionados com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $consulta = Consulta::findOrFail($id);
        return view('consultas.show', compact('consulta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //obtendo os dados dos pacientes
        $pacientes = Paciente::pluck('nome', 'id');
        //obtendo os dados dos médicos
        $medicos = Medico::pluck('nome', 'id');

        $consulta = Consulta::findOrFail($id);
        return view('consultas.edit', compact('consulta', 'pacientes', 'medicos'));
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
            'paciente_id'      =>       'required|max:35',
            'medico_id'        =>       'required|max:35',
            'data'             =>       'required',
            'hora'             =>       'required'
        ]);
        Consulta::whereId($id)->update($validateData);

        return redirect('/consultas')->with('success', 'Dados atualizados com sucesso!');
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
        $consulta = Consulta::findOrFail($id);
        // realizando a exclusão
        $consulta->delete();
        // redirecionando para o diretório raiz (index)
        return redirect('/consultas')->with('success', 'Dados removidos com sucesso!');
    }
}
