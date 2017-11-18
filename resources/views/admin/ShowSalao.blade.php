@extends('layouts.app')

@section('content')
<table class="table" style="background: #fff;border-radius: 4px;">
  <thead>
    <tr>
      <th scope="col">Nome</th>
      <th scope="col">Setor</th>
      <th scope="col">Endereço</th>
      <th scope="col">Telefone</th>
      <th scope="col">Status</th>
      <th scope="col" style="width: 70px;">Editar</th>
      <th scope="col" style="width: 150px;">Deletar</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">{{$salao->nome}}</th>
      <td>{{$salao->setor}}</td>
      <td>{{$salao->endereco}}</td>
      <td>{{$salao->numero}}</td>
      @if($salao->status == 0)
      <td>Salão Aprovado</td>
      @elseif($salao->status == 1)
      <td>Salão Não Aceito</td>
      @else($salao->status == 2)
      <td>Salão Em Aprovação</td>
      @endif
      <td><a href="{{url('admin/salao')}}/{{$salao->id}}/edit" type="button" class="btn btn-warning">Editar</a></td>
      <td><form action='{{route('salao.destroy', $salao->id)}}' method='POST'>
<input name="_method" type="hidden" value="DELETE">
<input name="_token" type="hidden" value="{{csrf_token()}}">
<button type='submit' class='btn btn-danger' value="Deletar {{$salao->nome}}">Deletar</button>
</form></td>
    </tr>
  </tbody>
</table>
@endsection