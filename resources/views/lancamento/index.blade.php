@extends('layouts.base')

@section('conteudo')

    <h1>  <i class="bi bi-piggy-bank-fill"></i> Lançamentos - <a href="{{ route('lancamento.create') }}" class="btn btn-dark">Novo</a> </h1>
    <h2> Usuário {{Auth::user()->nome}} - Total de Lançamentos - {{$lancamentos->count()}} - R$ {{$lancamentos->sum('valor')}}</h2>
    <table class="table table-striped table-border">
        <thead>
            <tr>
                <th>Ações</th>
                <th>Id</th>
                <th>Data de Faturamento</th>
                <th>R$ Valor</th>
                <th>Tipo</th>
                <th>Centro de Custo</th>
                <th>Decrição</th>
                <th>Data de Lançamento</th>
                <th>Data de Atualização</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($lancamentos->get() as $lancamento)
            <tr>
                <td>
                    <a href="{{ route('lancamento.edit', ['id'=>$lancamento->id_lancamento]) }}" class="btn btn-success">Editar</a>
                </td>
                <td>{{$lancamento->id_lancamento}}</td>
                <td>{{$lancamento->dt_faturamento->format('d/m/Y')}}</td>
                <td>{{$lancamento->Valor}}</td>
                <td>{{$lancamento->centroCusto->tipo->tipo}}</td>
                <td>{{$lancamento->centroCusto->centro_custo}}</td>
                <td>{{$lancamento->descricao}}</td>
                <td>{{$lancamento->created_at}}</td>
                <td>{{$lancamento->update_at}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    
@endsection