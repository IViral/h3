@extends('layouts.app')

@section('content')
@if(isset($salao))
    <form action="{{route('salao.update', $salao->id)}}" class="form" method="post" files="true" enctype="multipart/form-data">
    {!! method_field('PUT') !!}
@else
    <form action="{{route('salao.store')}}" method="post" files="true" enctype="multipart/form-data">
@endif
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Nome do Salão</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" value="{{$salao->nome or old('nome')}}" name="nome" placeholder="Nome">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Setor</label>
    <div class="col-sm-5">
      <input type="text" class="form-control"  value="{{$salao->setor or old('setor')}}" name="setor" placeholder="Setor">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Endereço</label>
    <div class="col-sm-5">
      <input type="text" class="form-control"  value="{{$salao->endereco or old('endereco')}}" name="endereco" placeholder="Endereço">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Telefone</label>
    <div class="col-sm-5">
      <input type="text" class="form-control"  value="{{$salao->numero or old('numero')}}" name="numero" placeholder="Telefone">
    </div>
  </div>
  <input type="hidden" name="_token" value="{{csrf_token()}}">
  <div class="form-group row">
    <div class="col-sm-5">
      <button type="submit" class="btn btn-primary">Cadastrar</button>
      @if(isset($salao))
      <a href="{{url('admin/salao')}}/{{$salao->id}}" type="button" class="btn btn-danger">Voltar</a>
      @else
      <a href="{{url('admin/salao')}}" type="button" class="btn btn-danger">Voltar</a>
      @endif
    </div>
  </div>
</form>
@endsection