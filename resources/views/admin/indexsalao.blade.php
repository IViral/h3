@extends('layouts.app')

@section('content')
<div class="separar-bt" style="margin-bottom: 10px;">
<a href="{{url('admin/salao/create')}}" type="button" class="btn btn-primary">Adicionar salão</a>
</div>
<table class="table" style="background: #fff;border-radius: 4px;">
  <thead>
    <tr>
      <th scope="col">Nome</th>
      <th scope="col">Setor</th>
      <th scope="col">Endereço</th>
      <th scope="col">Telefone</th>
      <th scope="col">Status</th>
      <th scope="col" style="width: 70px;">Editar</th>
      <th scope="col" style="width: 150px;">Mais informações</th>
    </tr>
  </thead>
  <tbody>
    @forelse($salao as $saloes)
    <tr>
      <td>{{$saloes->nome}}</td>
      <td>{{$saloes->setor}}</td>
      <td>{{$saloes->endereco}}</td>
      <td>{{$saloes->numero}}</td>
      @if($saloes->status == 0)
      <td>Salão Aprovado</td>
      @elseif($saloes->status == 1)
      <td>Salão Não Aceito</td>
      @else($saloes->status == 2)
      <td>Salão Em Aprovação</td>
      @endif
      <td><button type="button" class="btn btn-warning">Editar</button></td>
      <td><button type="button" class="btn btn-info">Mais informações</button></td>
    </tr>
    @empty
    <td>Nem 1 salão cadastrado em sua conta</td>
    @endforelse
  </tbody>
</table> 
@endsection