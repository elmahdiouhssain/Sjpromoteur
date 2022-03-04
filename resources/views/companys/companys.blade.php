@extends('layouts.layout')
@section('content')
 <div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="breadcrumb-holder">
                                <h1 class="main-title float-left">List des Sociète</h1>
                                <ol class="breadcrumb float-right">
                                    <li class="breadcrumb-item">Home</li>
                                    <li class="breadcrumb-item active">Sociètes</li>
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
                                        @can('societe-create')
                                       <a role="button" href="{{ route('companys.create') }}" class="btn btn-dark mb-2">
                                        Ajouter une sociète

                                             <span class="btn-label btn-label-right">
                                                <i class="fas fa-building"></i>
                                            </span>
                                        </a>
                                        @endcan
                                </div>
                                @can('societe-list')
                                <div class="container">
                                    <div class="table-responsive">
                                        <table class="table table-striped" id="emptableid" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Logo</th>
                                                    <th>Raison social</th>
                                                    <th>Raison social AR</th>
                                                    <th>Ville</th>
                                                    <th>Rib</th>
                                                    <th>Fax</th>
                                                    <th>Ice</th>
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
                                              url: '{{url('companyajax')}}',
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
                                              {data: "id", className: 'id'},
                                              {data: "logo",
                                              render : function(data,type,row){
                                                            var label;
                                                            return '<img src="' + row.logo + '" class="rounded-circle" style="width: 90px;height: 90px;">'
                                                        },
                                               className: 'logo'},
                                              {data: "raison_social", className: 'raison_social'},
                                              {data: "raison_social_ar", className: 'raison_social_ar'},
                                              {data: "ville", className: 'ville'},
                                              {data: "rib", className: 'rib'},
                                              {data: "fax", className: 'fax'},
                                              {data: "ice", className: 'ice'},
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
                                        <h2>Vous n'êtes pas autorisé à voir les sociètes</h2>
                                        </center>
                                        @endcan

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