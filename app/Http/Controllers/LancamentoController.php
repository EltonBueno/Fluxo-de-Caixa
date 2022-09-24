<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Lancamento, CentroCusto, User, Tipo};
use Illuminate\Support\Facades\Auth;

class LancamentoController extends Controller
{
    /**
     * Mostrar os lançamentos do usuário.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $lancamentos = Lancamento::where('id_user', Auth::user()->id_user)
                                        ->orderBy('dt_faturamento', 'desc');
       
        return view('lancamento.index')->with(compact('lancamentos'));
    }

    /**
     * Encaminha para o form de cadastro
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lancamento = null;
        $centrosDeCusto = CentroCusto::orderBy('centro_custo');
        $entradas = CentroCusto::where('id_tipo',1)->orderBy('centro_custo');
        $saidas = CentroCusto::where('id_tipo',2)->orderBy('centro_custo');
        return view('lancamento.form')->with(compact('entradas','saidas', 'lancamento'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $lancamento = new Lancamento();      
        
        $lancamento->fill($request->all());
        $lancamento->id_user = Auth::user()->id_user;

        $lancamento->save();
        return redirect()->route('lancamento.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lancamento  $lancamento
     * @return \Illuminate\Http\Response
     */
    public function show(Lancamento $lancamento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lancamento  $lancamento
     * @return \Illuminate\Http\Response
     */
    public function edit(Lancamento $lancamento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lancamento  $lancamento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lancamento $lancamento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lancamento  $lancamento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lancamento $lancamento)
    {
        //
    }
}
