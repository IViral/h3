@extends('layouts.app')

@section('content')
<table class="table" style="background: #fff;border-radius: 4px;">
  <thead>
    <tr>
      <th scope="col">Nome do Salão</th>
      <th scope="col">Nome do Corte</th>
      <th scope="col">Preço</th>
      <th scope="col">Imagem</th>
      <th scope="col" style="width: 70px;">Editar</th>
      <th scope="col" style="width: 150px;">Deletar</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">{{$corte->salao_nome}}</th>
      <td>{{$corte->nome}}</td>
      <td>{{$corte->preco}}</td>
      <td><img src="{{url('img')}}/{{$corte->img}}" style="max-width:200px;"></td>
      <td><a href="{{url('admin/corte')}}/{{$corte->id}}/edit" type="button" class="btn btn-warning">Editar</a></td>
      <td><form action='{{route('corte.destroy', $corte->id)}}' method='POST'>
<input name="_method" type="hidden" value="DELETE">
<input name="_token" type="hidden" value="{{csrf_token()}}">
<button type='submit' class='btn btn-danger' value="Deletar {{$corte->nome}}">Deletar</button>
</form></td>
    </tr>
  </tbody>
</table>
<a href="{{url('admin/corte')}}" type="button" class="btn btn-primary">Voltar</a>
@endsection