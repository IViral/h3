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
      @if($saloes->status == 2)
      <td>Salão em Aprovação</td>
      @endif
      <td><a href="{{url('admin/analise/salao')}}/{{$saloes->id}}/edit" type="button" class="btn btn-info">Aprovar/Reprovar</button></a>
    </tr>
    @empty
    <td>Nem 1 salão cadastrado em sua conta</td>
    @endforelse
  </tbody>
</table>
{{ $salao->links() }}
@endsection