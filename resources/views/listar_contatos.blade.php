@extends('layout')

@section('body')
        <!-- Breadcrumbs-->

<!-- Example DataTables Card-->
<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-address-card"></i> Lista de contatos</div>
    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Telefone</th>
                    <th>Data Aniversario</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Telefone</th>
                    <th>Data Aniversario</th>
                    <th></th>
                    <th></th>
                </tr>
                </tfoot>
                <tbody>
                @foreach($contatos as $contato)
                    <tr>
                        <td>{!! $contato->name !!}</td>
                        <td>{!! $contato->email !!}</td>
                        <td>{!! $contato->phone_number !!}</td>

                        <td>{!! implode("/",array_reverse(explode("-", $contato->date_birth))) !!}</td>

                        <form class="form-horizontal" role="form" method="post"
                              action="{!! url('/editarContato') !!}" accept-charset="UTF-8"
                              autocomplete="off">
                            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                            <input type="hidden" name="id" id="id" value="{!! $contato->id !!}">
                            <td><button type="submit" class="btn btn-success">ALTERAR</button> </td>
                        </form>

                        <form class="form-horizontal" role="form" method="post"
                              action="{!! url('/excluirContato') !!}" accept-charset="UTF-8"
                              autocomplete="off">
                            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                            <input type="hidden" name="id" id="id" value="{!! $contato->id !!}">
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