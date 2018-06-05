@extends('layout')

@section('body')
        <!-- Breadcrumbs-->

<!-- Example DataTables Card-->
<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-users"></i> Lista de Usuarios</div>
    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th></th>
                    <th></th>
                </tr>
                </tfoot>
                <tbody>
                @foreach($usuarios as $usuario)
                    <tr>
                        <td>{!! $usuario->name !!}</td>
                        <td>{!! $usuario->email !!}</td>

                        <form class="form-horizontal" role="form" method="post"
                              action="{!! url('/editarUsuario') !!}" accept-charset="UTF-8"
                              autocomplete="off">
                            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                            <input type="hidden" name="id" id="id" value="{!! $usuario->id !!}">
                            <td><button type="submit" class="btn btn-success">ALTERAR</button> </td>
                        </form>

                        <form class="form-horizontal" role="form" method="post"
                              action="{!! url('/excluirUsuario') !!}" accept-charset="UTF-8"
                              autocomplete="off">
                            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                            <input type="hidden" name="id" id="id" value="{!! $usuario->id !!}">
                            <td><button type="submit" class="btn btn-danger">EXCLUIR</button> </td>
                        </form>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div> -->
</div>
@endsection