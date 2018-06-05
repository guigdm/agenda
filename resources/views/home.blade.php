@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                                {!! $id_user !!}
                    @if (count($contatos) == 0)

                                {!! $contatos !!}

                        vaca sem contatos
                    @else
                        arruma essa bagaça

                    @endif
                        voce esta logado!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
