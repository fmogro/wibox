@extends('layouts.app')


@section('content')
<div class="row">
  <div class="col-lg-12 margin-tb">
    <div class="pull-left">
      <h2>Editar usuarios</h2>
    </div>

  </div>
</div>


@if (count($errors) > 0)
<div class="alert alert-danger">
  <strong>Whoops!</strong> Problemas con un campo<br><br>
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif


{!! Form::model($user, ['method' => 'PATCH','route' => ['users.update', $user->id]]) !!}
<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
      <strong>Nombres:</strong>
      {!! Form::text('name', null, array('placeholder' => 'Nombre','class' => 'form-control')) !!}
    </div>
  </div>
  <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
      <strong>Correo electrónico:</strong>
      {!! Form::text('email', null, array('placeholder' => 'Correo electrónico','class' => 'form-control')) !!}
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
      <strong>Confirmar contraseña:</strong>
      {!! Form::password('confirm-password', array('placeholder' => 'Confirmar contraseña','class' => 'form-control'))
      !!}
    </div>
  </div>
  <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
      <strong>Role:</strong>
      {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control','multiple')) !!}
    </div>
  </div>
  <div class="col-xs-12 col-sm-12 col-md-12 text-center">
    <button type="submit" class="btn btn-primary">Actualizar</button>
  </div>
</div>
{!! Form::close() !!}
<div class="pull-right">
  <a class="btn btn-primary" href="{{ route('users.index') }}">Atrás</a>
</div>
@endsection