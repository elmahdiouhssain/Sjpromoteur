@extends('layouts.layout')
@section('content')

 <div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="breadcrumb-holder">
                                <h1 class="main-title float-left">List des fournisseurs</h1>
                                <ol class="breadcrumb float-right">
                                    <li class="breadcrumb-item">Home</li>
                                    <li class="breadcrumb-item active">Les fournisseurs</li>
                                </ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="card mb-3">
                                <div class="card-header">
                                        <center>
                                        @include('flash-message')
                                        </center>
                                </div>
                                <div class="card-body">
                                    <center>
                                       
                                    
                                       <a role="button" href="{{ route('emps.create') }}" class="btn btn-success mb-2" >
                                        Ajouter un fournisseur
                                             <span class="btn-label btn-label-right">
                                                <i class="fas fa-dolly"></i>
                                            </span>
                                        </a><br>
                                      
                                
                                  
                                   
                                    <br>
                                    </center><br>
                                    <div class="container">
                                        
                                    <div class="table-responsive">
                                        <table class="table table-striped" id="emptableid" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>Raison social</th>
                                                    <th>Ice</th>
                                                    <th>N°télèphone</th>
                                                    <th>Email</th>
                                                    <th>Rib bancaire</th>
                                                    <th>Realisé par</th>
                                                    <th>Enregisté le</th>
                                                    <th>Action </th>
                                                </tr>
                                            </thead>
                                             <tbody>

                                             </tbody>
                                        
                                        </table>
                                       
                                    </div>
                                    <!-- end table-responsive-->
                                    <script src="{{ asset('static/js/jquery.min.js') }}"></script>
                                    <script src="{{ asset('static/js/jquery.dataTables.min.js') }}"></script>

                                    <script type="text/javascript">
                        $(document).ready(function() {
                     
                          $("#emptableid").DataTable({
                                  serverSide: true,
                                  ajax: {
                                      url: '{{url('employeesajax')}}',
                                      data: function (data) {
                                          data.params = {
                                              sac: "helo"
                                          }
                                      }
                                  },
                                  buttons: true,
                                  searching: true,
                                  scrollY: 500,
                                  scrollX: false,
                                  dom: 'Bfrtip',
                                  buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
                                  scrollCollapse: true,
                                  columns: [
                                      {data: "raison_s", className: 'raison_s'},
                                      {data: "ice", className: 'ice'},
                                      {data: "n_telephone", className: 'n_telephone'},
                                      {data: "email", className: 'email'},
                                      {data: "c_bancaire", className: 'c_bancaire'},
                                      {data: "realise_par", className: 'realise_par'},
                                      {data: "created_at", className: 'created_at'},
                                      {
                                    data: 'action', 
                                    name: 'action', 
                                    orderable: true, 
                                    searchable: true
                                },
                                   
                                  ]  
                            });
                     
                        });
                     
                      </script>
                       @else
                                    <center>
                                        <i class="fas fa-exclamation-triangle fa-7x" style="color:red;"></i>
                                    <h2>Vous n'êtes pas autorisé à voir les employeés</h2>
                                    </center>
                                    @endcan
                                    </div>
                                </div>
                                <!-- end card-body-->

                            </div>
                            <!-- end card-->

                        </div>

                    </div>
                    <!-- end row-->

                </div>
                <!-- END container-fluid -->
            </div>
            <!-- END content -->
        </div>
        <!-- END content-page -->

@endsection

  





