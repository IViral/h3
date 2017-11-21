@extends('layouts.app')

@section('content')
    <form action="{{route('salao.update', $salao->id)}}" class="form" method="post" files="true" enctype="multipart/form-data">
    {!! method_field('PUT') !!}
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Nome do Salão</label>
    <div class="col-sm-5">
    <select class="form-control" name="status" id="exampleFormControlSelect1">
    <option value='0'>Aprovar</option>
    <option value='1'>Reprovar</option>
    </select>
    </div>
  </div>
  <input type="hidden" name="_token" value="{{csrf_token()}}">
  <div class="form-group row">
    <div class="col-sm-5">
      <button type="submit" class="btn btn-primary">Confirma</button>
      <a href="{{url('admin/analise/salao')}}" type="button" class="btn btn-danger">Voltar</a>
    </div>
  </div>
</form>
@endsection