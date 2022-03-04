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
                                <span class="text-white">Le dernier : <a href="" style="color:white;"></a></span>
                            </div>
                        </div>

                        <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                            <div class="card-box noradius noborder bg-danger">
                               
                                <i class="fas fa-money-check-alt float-right text-white"></i>
                                <h6 class="text-white text-uppercase m-b-20">Total Chèques</h6>
                                <h1 class="m-b-20 text-white counter">x</h1>
                                <span class="text-white">Le dernièr versé par : <a href="#" style="color:white;">x</a></span>

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

