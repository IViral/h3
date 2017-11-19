@extends('layouts.app')

@section('content')
<div class="separar-bt" style="margin-bottom: 10px;">
<a href="{{url('admin/corte/create')}}" type="button" class="btn btn-primary">Adicionar corte</a>
</div>
<table class="table" style="background: #fff;border-radius: 4px;">
  <thead>
    <tr>
      <th scope="col">Nome do Salao</th>
      <th scope="col">Nome do Corte</th>
      <th scope="col">Preço</th>
      <th scope="col" style="width: 150px;">Mais informações</th>
    </tr>
  </thead>
  <tbody>
    @forelse($corte as $cortes)
    <tr>
      <td>{{$cortes->salao_nome}}</td>
      <td>{{$cortes->nome}}</td>
      <td>{{$cortes->preco}}</td>
      <td><a href="{{url('admin/corte')}}/{{$cortes->id}}" type="button" class="btn btn-info">Mais informações</button></a>
    </tr>
    @empty
    <td>Nem 1 salão cadastrado em sua conta</td>
    @endforelse
  </tbody>
</table>
{{ $corte->links() }}
@endsection