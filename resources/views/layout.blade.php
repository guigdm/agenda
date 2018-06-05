<!DOCTYPE html>
<html lang="pt">

<head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">



    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>AGENDA</title>
    <!-- Bootstrap core CSS-->
    <link href="{!!'vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet'!!}">
    <!-- Custom fonts for this template-->
    <link href="{!!'vendor/font-awesome/css/font-awesome.min.css'!!}" rel="stylesheet" type="text/css">
    <!-- Page level plugin CSS-->
    <link href="{!!'vendor/datatables/dataTables.bootstrap4.css'!!}" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="{!!'css/sb-admin.css" rel="stylesheet'!!}">
    <script type="text/javascript" src="{!! asset('vendor/jquery/jquery.js') !!}"></script>
    <script type="text/javascript"  src="{!! asset('vendor/jquery/jquery.mask.min.js') !!}"></script>
    <script type="text/javascript"  src="{!! asset('vendor/jquery/jquery.mask.js') !!}"></script>

    <script>
        jQuery(document).ready(function($) {
            $("#data").mask("99/99/9999");
            $("#telefone").mask("(99)9 9999-9999");

        });
    </script>

</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="{!! url('/inicio') !!}">AGENDA</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                <a class="nav-link" href="{!! url('/inicio') !!}">
                    <i class="fa fa-fw fa-home"></i>
                    <span class="nav-link-text">Inicio</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
                <a class="nav-link" href="{!! url('/mostrar') !!}">
                    <i class="fa fa-fw fa-address-card"></i>
                    <span class="nav-link-text">Listar contatos</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
                <a class="nav-link" href="{!! url('/salvar') !!}">
                    <i class="fa fa-fw fa-address-book"></i>
                    <span class="nav-link-text">Criar Contato</span>
                </a>
            </li>

            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
                <a class="nav-link" href="{!! url('/mostrarUsuario') !!}">
                    <i class="fa fa-fw fa-users"></i>
                    <span class="nav-link-text">Listar usuarios</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
                <a class="nav-link" href="{!! url('/salvarUsuario') !!}">
                    <i class="fa fa-fw fa-user-plus"></i>
                    <span class="nav-link-text">Criar usuario</span>
                </a>
            </li>


        </ul>
        <ul class="navbar-nav sidenav-toggler">
            <li class="nav-item">
                <a class="nav-link text-center" id="sidenavToggler">
                    <i class="fa fa-fw fa-angle-left"></i>
                </a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
                    <i class="fa fa-fw fa-sign-out"></i>Sair</a>
            </li>
        </ul>
    </div>
</nav>
<div class="content-wrapper">
    <div class="container-fluid">
        @yield('body')
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
        <div class="container">
            <div class="text-center">
                <small>Copyright © agenda 2018</small>
            </div>
        </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Realmente gostaria de sair??</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Selecione "Sair" para encerrar sua sessão.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-primary" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        Sair
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="{!!'vendor/jquery/jquery.min.js'!!}"></script>
    <script src="{!!'vendor/bootstrap/js/bootstrap.bundle.min.js'!!}"></script>
    <!-- Core plugin JavaScript-->
    <script src="{!!'vendor/jquery-easing/jquery.easing.min.js'!!}"></script>
    <!-- Page level plugin JavaScript-->
    <script src="{!!'vendor/datatables/jquery.dataTables.js'!!}"></script>
    <script src="{!!'vendor/datatables/dataTables.bootstrap4.js'!!}"></script>
    <!-- Custom scripts for all pages-->
    <script src="{!!'js/sb-admin.min.js'!!}"></script>
    <!-- Custom scripts for this page-->
    <script src="{!!'js/sb-admin-datatables.min.js'!!}"></script>
</div>
</body>

</html>
