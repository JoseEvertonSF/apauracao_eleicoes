<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Eleições 2024</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">
        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        @vite(["resources/js/app.js"])
    </head>
    <body>
        <!-- Begin page -->
        <div>
            <!-- Topbar Start -->
            <div class="navbar navbar-expand flex-column flex-md-row navbar-custom">
                <div class="container-fluid">
                    <ul class="navbar-nav flex-row ml-auto d-flex list-unstyled topnav-menu float-right mb-0"></ul>
                </div>
            </div>
            <!-- end Topbar -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->
            <div class="content">
                <div class="col-xl-12">
                    
                    <!-- Start Content-->
                    <div class="container-fluid col-md-8">
                        <div class="row page-title">
                            <div class="col-md-12 mt-5">
                                <h4 class="mb-1 mt-5">Candidatos a prefeito</h4>
                                <hr/>
                            </div>
                        </div>
                        <div class="row col-md-12 col-xl-12 m-auto">
                            @foreach($executivo['candidatos'] as $candidato)
                                <div class="col-md-4" id="{{$candidato['numero']}}">
                                    <div class="card">
                                        <div class="card-body row mb-0">
                                            <div class="text-center m-auto">
                                                <img class="col-md-12" src="{{$fotos[$candidato['numero']]}}"/>
                                                <div class="mt-2">
                                                    <p class="m-0"><strong>{{$candidato['nome']}}</strong></p>
                                                    <span>({{$candidato['partido']}})</span>                                                   
                                                </div>
                                            </div>
                                            <div class="ml-auto mr-auto mt-2 text-center">
                                                <h1 id="{{'total-'.$candidato['numero']}}">{{$candidato['votos']['porcentagem'].'%'}}</h1>
                                                <h5>{{number_format($candidato['votos']['quantidade'], 0, '', '.')}} votos</h5>
                                                <div class="m-auto">
                                                    @if($candidato['matEleito'] == 'E')
                                                        <span class="badge badge-success p-2">ELEITO</span>
                                                    @else
                                                        <span class="badge badge-danger p-2">NÃO ELEITO</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="row page-title">
                            <div class="col-xl-12">
                                <div class="row col-xl-12 justify-around">
                                    <h4 class="mt-4">Candidatos a vereador</h4>
                                    <input class="form-control ml-auto col-md-3 mt-3" id="filtro-vereador" placeholder="Buscar nome ou número" onkeyup="aplicaFiltroCards()">
                                </div>
                                <hr/>
                            </div>
                        </div>
                        <div class="row col-md-12 col-xl-12 m-auto" id="candidatos">
                            @foreach($vereador['candidatos'] as $candidato)
                                <div class="col-md-4 cards-container" id="{{'candidato-'.$candidato['numero']}}">
                                    <div class="card">
                                        <div class="card-body row mb-0">
                                            <div class="col-md-5 mt-4">
                                                <div class="text-center">
                                                    <span class="m-0 nome" style="font-weight: 700">{{$candidato['nome']}}</span>
                                                    <span>({{$candidato['partido']}})</span> 
                                                    <span class="numero">{{$candidato['numero']}}</span>                                                   
                                                </div>
                                            </div>
                                            <div class="ml-auto mr-auto text-center col-md-4">
                                                <h4>{{$candidato['votos']['porcentagem'].'%'}}</h4>
                                                <h6 class="qtde-votos">{{number_format($candidato['votos']['quantidade'], 0, '', '.')}} votos</h6>
                                                <div class="m-auto">
                                                    @if($candidato['eleito'] == 's')
                                                        <span class="badge badge-success">ELEITO</span>
                                                    @else
                                                        <span class="badge badge-danger">NÃO ELEITO</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div> <!-- container-fluid -->
                </div> <!-- content -->
                <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-11 text-center">
                                2024 &copy;. Todos os direitos reservados. Criado com <i class='uil uil-heart text-danger font-size-12'></i> por José Everton
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->
            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->
        <!-- Vendor js -->
        <script src="assets/js/vendor.min.js"></script>
        <!-- App js -->
        <script src="assets/js/app.min.js"></script>
        <script src="assets/js/filtro.js"></script>
        <script src="assets/js/app.js"></script>
        <script type="module">
            window.Echo.channel('apuracao')
                .listen('VotosApuradosEvent', (e) => {
                    console.log(e);
            })
        </script>
    </body>
</html>