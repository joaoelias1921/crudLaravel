<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Convenio;

class ConvenioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $convenios = Convenio::all();
        return view('convenios.index', compact('convenios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('convenios.create');
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
            'nome_conv'       =>      'required',
            'fone_conv'       =>      'required',
            'site_conv'       =>      'required',
            'contato_conv'    =>      'required',
            'perccons_conv'   =>      'required',
            'percexame_conv'  =>      'required'
        ]);
        $convenio = Convenio::create($validateData);

        return redirect('/convenios')->with('success','Dados adicionados com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $convenio = Convenio::findOrFail($id);
        return view('convenios.show', compact('convenio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $convenio = Convenio::findOrFail($id);
        return view('convenios.edit', compact('convenio'));
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
            'nome_conv'       =>      'required',
            'fone_conv'       =>      'required',
            'site_conv'       =>      'required',
            'contato_conv'    =>      'required',
            'perccons_conv'   =>      'required',
            'percexame_conv'  =>      'required'
        ]);
        Convenio::whereId($id)->update($validateData);

        return redirect('/convenios')->with('success', 'Dados atualizados com sucesso!');
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
        $convenio = Convenio::findOrFail($id);
        // realizando a exclusão
        $convenio->delete();
        // redirecionando para o diretório raiz (index)
        return redirect('/convenios')->with('success', 'Dados removidos com sucesso!');
    }
}