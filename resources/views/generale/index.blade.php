@extends('layouts.layout')
@section('content')
@if (Auth::user()->is_admin === 1)
        <div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="breadcrumb-holder">
                                <h1 class="main-title float-left">Tableaux de bord</h1>
                                <ol class="breadcrumb float-right">
                                    <li class="breadcrumb-item">Home</li>
                                    <li class="breadcrumb-item active">Tableaux de bord</li>
                                </ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                    <div class="row">
                        <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                            <div class="card-box noradius noborder bg-purple">
                                <i class="far fa-user float-right text-white"></i>
                                <h6 class="text-white text-uppercase m-b-20">Total Adhèrants</h6>
                                <h1 class="m-b-20 text-white counter">{{$data['adherants']}}</h1>
                                <span class="text-white">Le dernier : <a href="{{ route('adherants.show',$data['adherants_day']->id) }}" style="color:white;">{{$data['adherants_day']->nom_complete}}</a></span>
                            </div>
                        </div>

                        <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                            <div class="card-box noradius noborder bg-danger">
                               
                                <i class="fas fa-money-check-alt float-right text-white"></i>
                                <h6 class="text-white text-uppercase m-b-20">Total Chèques</h6>
                                <h1 class="m-b-20 text-white counter">{{ !empty($data['cheques']) ? $data['cheques']:'' }}</h1>
                                <span class="text-white">Le dernièr versé par : <a href="{{ route('stats-cheques.show',$data['cheques_day']->id) }}" style="color:white;">{{ !empty($data['cheques_day']->verse_par) ? $data['cheques_day']->verse_par:'' }}</a></span>

                            </div>
                        </div>

                        <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                            <div class="card-box noradius noborder bg-info">
                                <i class="fas fa-file-invoice-dollar float-right text-white"></i>
                                <h6 class="text-white text-uppercase m-b-20">Revenue</h6>
                                <h3 class="m-b-20 text-white counter">{{$data['total']}}<te style="font-size:20px; color: red;"> (DHS)</te></h3>
                                <span class="text-white">0 Aujourdhui</span>
                            </div>
                        </div>
                         <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                            <div class="card-box noradius noborder bg-success">
                                
                                <i class="fas fa-toolbox float-right text-white"></i>
                                <h6 class="text-white text-uppercase m-b-20">Total sociètes</h6>
                                <h1 class="m-b-20 text-white counter">{{$data['societes']}}</h1>
                                <span class="text-white">0 Aujourdhui</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="wrapper">
                        <canvas id="barChart"></canvas>
                        <style type="text/css">.wrapper {
                        height: 500px !important;
                        }</style>
                    </div><br><br><br>
                    <script src="{{ asset('static/js/jquery.min.js') }}"></script>
                    <script src="{{ asset('js/chart.min.js') }}"></script>
                <script>
                $(function(){
                    var datas = <?php echo json_encode($datas); ?>;
                    var barCanvas = $("#barChart");
                    var barChart = new Chart(barCanvas,{
                        type:'bar',
                        data:{
                            labels:['----','Janvier','Fevrier','Mars','Avril','Mai','Juin','Juillet','Out','September','October','November','December'],
                            datasets:[
                                {
                                    label:'Les adhèrants Croissance par ( mois ) | 2022',
                                    data:datas,
                                    backgroundColor:['red','orange','yellow','green','blue','indigo','violet','purple','pink','silver','gold','brown'],
                                }

                            ]
                        },
                        options:{
                            maintainAspectRatio: false,
                            scales:{
                                yAxes:[{
                                    ticks:{
                                        beginAtZero:false
                                    }
                                }]
                            }
                        }
                    });
                })
            </script>

            </div>

                    <div class="container">
                    <!-- end row -->
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
                            <div class="card mb-3">
                                <div class="card-header">
                                    <h3><i class="fas fa-chart-bar"></i> Dernier authentication</h3>
                                   Le dernier utilisateur connecté.
                                </div>
                                <div class="card-body">
                                    <td>
                                    <div class="user_avatar_list d-none d-none d-lg-block"><img alt="image" src="{{ asset('static/images/avatars/avatar2.png') }}"></div>
                                    <h4>Nom : {{$data['lastuser']->name}}</h4>
                                    <p>Email : {{$data['lastuser']->email}}</p>
                                    <p>Role : 

                         <label class="badge badge-success">0</label>
                                          
                                    </p>
                                    </td>
                                </div>
                            
                            </div>
                            <!-- end card-->
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
                            <div class="card mb-3">
                                <div class="card-header">
                                    <h3><i class="fas fa-chart-bar"></i> Dernier cheque</h3>
                                    le dernier cheque realisé .
                                </div>

                                <div class="card-body">
                                    <td>
                                    <div class="user_avatar_list d-none d-none d-lg-block">
                                       
                                    <div class="user_avatar_list d-none d-none d-lg-block"><img alt="image" src="{{ asset('static/images/cheque.png') }}"></div>
                             
                                    </div>
                                    <h4>Beneficier : {{ !empty($data['lastpay']->name) ? $data['lastpay']->name:'' }}</h4>
                                    <p>N chèque : {{ !empty($data['lastpay']->number) ? $data['lastpay']->number:'' }}</p>
                                    <p>Balance : {{ !empty($data['lastpay']->balance) ? $data['lastpay']->balance:'' }} DHS</p>
                                    </td>
                                </div>
                              
                            </div>
                            <!-- end card-->
                        </div>
                    </div>
                    <!-- end row -->
                    </div>

                  

                    
                </div>
                <!-- END container-fluid -->
            </div>
            <!-- END content -->
        </div>
        <!-- END content-page -->

        <!-- Non Admin page section -->
        @else
        <div class="row">
            <div class="col-xl-12">
        <div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="container-fluid">
                    <br><br><br>
            <center>
            <i class="fas fa-exclamation-triangle fa-7x" style="color:red;"></i>
            <h2>Vous n'êtes pas autorisé à voir les statistiques</h2>
            </center>

            </div>
                <!-- END container-fluid -->
            </div>
            <!-- END content -->
        </div>
        <!-- END content-page -->
        </div>
        </div>
        @endif
        <!-- END Non Admin page section -->

@endsection

