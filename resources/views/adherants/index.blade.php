@extends('layouts.layout')
@section('content')

 <div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="breadcrumb-holder">
                                <h1 class="main-title float-left">List adherants</h1>
                                <ol class="breadcrumb float-right">
                                    <li class="breadcrumb-item">Home</li>
                                    <li class="breadcrumb-item active">adherants</li>
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
                                    @can('adherant-create')
                                       <a role="button" href="{{ route('adherants.create') }}" class="btn btn-warning mb-2" >
                                        Ajouter un Client
                                             <span class="btn-label btn-label-right">
                                                <i class="fas fa-file-alt"></i>
                                            </span>
                                        </a><br>
                                    @endcan
                                  
                                    @foreach ($data['amicals'] as $am)
                                    <?php $getdata = DB::select('select * from adherants where societe_id='.$am->id); ?>
                                    @can('adherant-list')
                                    <a href="/fulllist/{{ $am->id }}" target="_blank" class="btn btn-outline-success">{{ $am->raison_social }}</a>
                                    @endcan

                                    @endforeach
                                   
                                    <br>
                                    </center><br>
                                    <div class="container">
                                        @can('adherant-list')
                                    <div class="table-responsive">
                                        <table class="table table-striped" id="emptableid" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>N“ dossier</th>
                                                    <th>Nom complèt</th>
                                                    <th>Identifie</th>
                                                    <th>Montant versé(DHS)</th>
                                                    <th>Realisé par</th>
                                                    <th>Date enregisté </th>
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
                                      url: '{{url('adherantsajax')}}',
                                      data: function (data) {
                                          data.params = {
                                              sac: "helo"
                                          }
                                      }
                                  },
                                  buttons: false,
                                  searching: true,
                                  scrollY: 500,
                                  scrollX: false,
                                  scrollCollapse: true,
                                  columns: [
                                      {data: "n_dossier", className: 'n_dossier'},
                                      {data: "nom_complete", className: 'nom_complete'},
                                      {data: "id_national", className: 'id_national'},
                                      {data: "montant_verse", className: 'montant_verse'},

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
                                    <h2>Vous n'êtes pas autorisé à voir les adhèrants</h2>
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

  





