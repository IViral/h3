@extends('welcome')

@section('content')
	<div class="col-md-12">
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Nome</th>
      <th scope="col">Setor</th>
      <th scope="col">Endereço</th>
      <th scope="col">Telefone</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">{{$salao->nome}}</th>
      <td>{{$salao->setor}}</td>
      <td>{{$salao->endereco}}</td>
      <td>{{$salao->numero}}</td>
    </tr>
  </tbody>
</table>

<div class="campo-foto" style="margin-bottom: 100px;">
<div class="row">
@forelse($cortes as $corte)
<div class="card" style="width: 20rem;">
  <img class="card-img-top" src="{{url('img')}}/{{$corte->img}}" alt="Card image cap">
  <ul class="list-group list-group-flush">
    <li class="list-group-item">{{$corte->nome}}</li>
    <li class="list-group-item">{{$corte->preco}}</li>
  </ul>
</div>
@empty
Nem 1 Corte Disponível
@endforelse
</div>
</div>

@endsection

@section('csstop')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">

@endsection

@section('cssc')

.contenty{
    margin: 0 auto;
    max-width: 1000px;
}
.card{
    float: left;
    margin-left: 3px;
    margin-top: 10px;
}

.card-img-top{
    width: 318px;
    height: 220px;
}

@endsection