@extends('layouts.app')

@section('content')
@if(isset($corte))
    <form action="{{route('corte.update', $corte->id)}}" class="form" method="post" files="true" enctype="multipart/form-data">
    {!! method_field('PUT') !!}
@else
    <form action="{{route('corte.store')}}" method="post" files="true" enctype="multipart/form-data">
@endif
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Nome do Salão</label>
    <div class="col-sm-5">
    <select class="form-control" name="salao_id" id="exampleFormControlSelect1">
    @if($saloes->count() > 0)
    @forelse($saloes as $salao)
    <option value='{{$salao->id}}'>{{$salao->nome}}</option>
    @empty
    @endforelse
    @else
      <option value="5">Você não tem salões cadastrado</option>
    @endif
    </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Nome do Corte</label>
    <div class="col-sm-5">
      <input type="text" class="form-control"  value="{{$corte->nome or old('nome')}}" name="nome" placeholder="Nome">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Preço</label>
    <div class="col-sm-5">
      <input type="text" class="form-control"  value="{{$corte->preco or old('preco')}}" name="preco" placeholder="Preço">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 col-form-label" style="position: relative;right: 15px;">Imagem</label>
    <input type="file" name="img" class="form-control-file" id="exampleFormControlFile1" style="left: 5px;position: relative;">
  </div>


  <input type="hidden" name="_token" value="{{csrf_token()}}">
  <div class="form-group row">
    <div class="col-sm-5">
      <button type="submit" class="btn btn-primary">Cadastrar</button>
      @if(isset($corte))
      <a href="{{url('admin/corte')}}/{{$corte->id}}" type="button" class="btn btn-danger">Voltar</a>
      @else
      <a href="{{url('admin/corte')}}" type="button" class="btn btn-danger">Voltar</a>
      @endif
    </div>
  </div>
</form>
@endsection