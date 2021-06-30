@extends('layouts.app')


@section('content')
<div class="row">
  <div class="col-lg-12 margin-tb">
    <div class="pull-left">
      <h2>Crear Usuario nuevo</h2>
    </div>

  </div>
</div>


@if (count($errors) > 0)
<div class="alert alert-danger">
  <strong>Whoops!</strong> Problemas con tu input.<br><br>
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif



{!! Form::open(array('route' => 'users.store','method'=>'POST')) !!}
<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
      <strong>Nombre:</strong>
      {!! Form::text('name', null, array('placeholder' => 'Nombre','class' => 'form-control')) !!}
    </div>
  </div>
  <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
      <strong>Correo:</strong>
      {!! Form::text('email', null, array('placeholder' => 'Correo','class' => 'form-control')) !!}
    </div>
  </div>
  <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
      <strong>Contraseña:</strong>
      {!! Form::password('password', array('placeholder' => 'Contraseña','class' => 'form-control')) !!}
    </div>
  </div>
  <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
      <strong>Confirmar Contraseña:</strong>
      {!! Form::password('confirm-password', array('placeholder' => 'Confirmar contraseña','class' => 'form-control'))
      !!}
    </div>
  </div>
  <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
      <strong>Roles:</strong>
      {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')) !!}
    </div>
  </div>
  <div class="col-xs-12 col-sm-12 col-md-12 text-center">
    <button type="submit" class="btn btn-primary">Guardar!</button>
  </div>
</div>
{!! Form::close() !!}
<div class="pull-right">
  <a class="btn btn-primary" href="{{ route('users.index') }}"> Atrás</a>
</div>
@endsection