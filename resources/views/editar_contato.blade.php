@extends('layout')

@section('body')
<!-- Breadcrumbs-->

<!-- Example DataTables Card-->
<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-address-book"></i> Editar Contato
    </div>
    <div class="card-body">
        @foreach($contatos as $contato)

        <form class="form-horizontal" role="form" method="post" action="{!! url('/salvarEditarContato') !!}" accept-charset="UTF-8" autocomplete="off">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
            <input type="hidden" name="id" id="id" value="{!! $contato->id !!}">
            <div class="form-group">
                <label class="control-label">Nome*</label>
                <div>
                    <input type="text" class="form-control" name="nome" maxlength="20" value="{!! $contato->name !!}" placeholder="nome completo">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label">E-mail*</label>
                <div>
                    <input type="text" class="form-control" name="email" maxlength="30" value="{!! $contato->email !!}" placeholder="email@exemplo.com">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label">Telefone*</label>
                <input type="text" name="phone_number"  required value="{!! $contato->phone_number !!}" class="telefone form-control" placeholder="(xx) xxxxx-xxxx"/>
            </div>

            <div class="form-group">
                <label class="control-label">Data de Aniversario*</label>
                <div>
                    <input type="text" class="form-control" name="data" maxlength="30" value="{!! implode("/",array_reverse(explode("-", $contato->date_birth))) !!}" placeholder="yyyy-mm-dd">
                </div>
            </div>


            <div class="form-group">
                <div >
                    <button type="submit" class="btn btn-success botao-contato">SALVAR</button>
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
