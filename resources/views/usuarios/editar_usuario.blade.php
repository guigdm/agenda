@extends('layout')

@section('body')
<script>
    function validaSenha() {
        var password = document.getElementById("password");
        var confirm_password = document.getElementById("password-confirm");

        if (password.value != confirm_password.value || password.value.length == 0 || confirm_password.value.length == 0 ) {
            document.getElementById('salvar').setAttribute('disabled','true')

        } else {
            document.getElementById('salvar').removeAttribute('disabled')
        }

    }
</script>

        <!-- Breadcrumbs-->

<!-- Example DataTables Card-->
<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-users"></i> Editar Usuario
    </div>
    <div class="card-body">
        @foreach($usuarios as $usuario)

            <form class="form-horizontal" role="form" method="post" action="{!! url('/salvarEditarUsuario') !!}" accept-charset="UTF-8" autocomplete="off">
                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                <input type="hidden" name="id" id="id" value="{!! $usuario->id !!}">
                <div class="form-group">
                    <label class="control-label">Nome*</label>
                    <div>
                        <input type="text" class="form-control" name="nome" maxlength="20" value="{!! $usuario->name !!}" placeholder="nome completo">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label">E-mail*</label>
                    <div>
                        <input type="text" class="form-control" name="email" maxlength="30" value="{!! $usuario->email !!}" placeholder="email@exemplo.com">
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class=" control-label">Senha</label>

                    <div class="col-md-4">
                        <input type="password"  id="password" class="form-control" name="senha" onkeyup="validaSenha()" required>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label for="senha-confirm" class="control-label">Confirme sua senha!</label>

                    <div class="col-md-4">
                        <input id="password-confirm" type="password" class="form-control" name="senha_confirma" onkeyup="validaSenha()"
                               required>
                    </div>
                </div>


                <div class="form-group">
                    <div >
                        <button type="submit" id="salvar" class="btn btn-success botao-contato" disabled>SALVAR</button>
                        <button type="reset" class="btn btn-warning botao-contato">LIMPAR</button>
                    </div>
                </div>
                @if(session('message'))
                    <div class="alert text-center alert-success">
                        {{session('message')}}
                    </div>
                @endif
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul class="alert-error">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </form>
        @endforeach
    </div>
    <!-- <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div> -->
</div>
@endsection
