@extends('layouts.base')

@section('conteudo')
    
    <h1>
        <i class="bi bi-basket-fill"></i>
        @if ($centro)    
        Atualizar Centro de Custo
        @else
        Novo Centro de Custo
        @endif
    </h1>
    @if ($centro)
    <form action="{{ route('centro.update', ['id'=>$centro->id_centro_custo]) }}" method="post">
        
    @else
    
    <form action="{{ route('centro.store') }}" method="post">
        
    @endif
        @csrf
        <div class="row">
            <div class="form-group col-md-6">
                <label for="centro_custo" class="form-label">centro de custo*</label>
                <input type="text" name="centro_custo" id="centro_custo" class="form-control" value="{{ $centro? $centro->centro_custo : old('centro_custo')}}" required>
            </div>
            
            <div class="form-group col-md-4">
                <label for="id_tipo" class="form-label">Tipo*</label>
                <select name="id_tipo" id="id_tipo" required class="form-control">
                    <option value="">Selecione</option>
                    @foreach($tipos as $tipo)
                        <option value="{{$tipo->id_tipo}}"
                        {{ $centro && $centro->id_tipo == $tipo->id_tipo ? 'selected' : '' }}
                            >
                            {{ $tipo->tipo}}</option>
                    @endforeach
                </select>
                
            </div>
            <div class="form-group col-md-2" id="form-tipo" >
                <input type="submit" value=" {{$centro ? 'Atualizar' : 'Cadastrar' }}" class="btn btn-primary">
            </div>
        </div>
    </form>


@endsection