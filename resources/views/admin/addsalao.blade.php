@extends('layouts.app')

@section('content')
@if(Session::has('success'))
<div class="alert alert-success" role="alert">{{ Session::get('success') }}</div>
@endif @if(Session::has('error'))
<div class="alert alert-danger" role="alert">{{ Session::get('error') }}</div>
@endif
<form action="{{route('salao.store')}}" method="post" files="true" enctype="multipart/form-data">
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Nome do Salão</label>
    <div class="col-sm-5">
      <input type="text" class="form-control"  name="nome" placeholder="Nome">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Setor</label>
    <div class="col-sm-5">
      <input type="text" class="form-control"  name="setor" placeholder="Setor">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Endereço</label>
    <div class="col-sm-5">
      <input type="text" class="form-control"  name="endereco" placeholder="Endereço">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Telefone</label>
    <div class="col-sm-5">
      <input type="text" class="form-control"  name="numero" placeholder="Telefone">
    </div>
  </div>
  <input type="hidden" name="_token" value="{{csrf_token()}}">
  <div class="form-group row">
    <div class="col-sm-5">
      <button type="submit" class="btn btn-primary">Cadastrar</button>
    </div>
  </div>
</form>
@endsection