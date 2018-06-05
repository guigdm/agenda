@extends('layout')

@section('body')



        <!-- Breadcrumbs-->

<!-- Example DataTables Card-->
<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-address-book"></i> Salvar Contato
    </div>
    <div class="card-body">

        <form class="form-horizontal" role="form" method="post" action="{!! url('/salvarContato') !!}" accept-charset="UTF-8" autocomplete="off">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
            <div class="form-group">
                <label class="control-label">Nome*</label>
                <div>
                    <input type="text" class="form-control" name="name" maxlength="20" value="{!! old('nome') !!}" placeholder="nome completo">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label">E-mail*</label>
                <div>
                    <input type="text" class="form-control" name="email" maxlength="30" value="{!! old('email') !!}" placeholder="email@exemplo.com">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label">Telefone*</label>
                <input type="text" name="phone_number"  required class="telefone form-control" value="{!! old('phone_number') !!}" id="telefone" placeholder="(xx)x xxxx-xxxx"/>
            </div>

            <div class="form-group">
                <label class="control-label">Data de Aniversario*</label>
                <div>
                    <input type="text" id="data" class="data form-control" name="data" maxlength="30" value="{!! old('data') !!}" placeholder="dd-mm-yyyy">
                </div>
            </div>


            <div class="form-group">
                <div >
                    <button type="submit" class="btn btn-success botao-contato">ENVIAR</button>
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
    </div>
    <!-- <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div> -->
</div>
@endsection
