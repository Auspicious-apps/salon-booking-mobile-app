@extends('layout-user.app')
@section('content')

	



    
     <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    
    <div class="staff-block text-center">
      <div class="staff-heading content-header">
         <h1 class="m-0">Configuración de usador </h1>
      </div> 
  
    </div>


  <div class="usersetting-main-block user-block-pas">

    		 <div class="row">

        <div class="col-md-12 ">
            <div class="panel panel-default">
                <h2>Cambiar clave</h2>

                <div class="panel-body">
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if($errors)
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger">{{ $error }}</div>
                        @endforeach
                    @endif
                    <form class="form-horizontal" method="POST" action="{{ url('user-setting') }}">
                        {{ csrf_field() }}

                        <div class="{{ $errors->has('new-password') ? ' has-error' : '' }}">
                            <label for="new-password" class="col-md-12 control-label">Clave Nuevo</label>

                            <div class="col-md-12">
                                <input id="new-password" type="password" class="form-control" name="new-password" required>

                                @if ($errors->has('new-password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('new-password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div>
                            <label for="new-password-confirm" class="col-md-12 control-label">Confirmar clave nuevo </label>

                            <div class="col-md-12">
                                <input id="new-password-confirm" type="password" class="form-control" name="new-password_confirmation" required>
                            </div>
                        </div>

                        <div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">
                                    Cambiar clave
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    </div>

  </div>
  <!-- /.content-wrapper -->



@endsection