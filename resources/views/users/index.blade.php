@extends('layouts.layout')
@section('content')
 <div class="content-page">

            <!-- Start content -->
            <div class="content">

                <div class="container-fluid">

                    <div class="row">
                        <div class="col-xl-12">
                            <div class="breadcrumb-holder">
                                <h1 class="main-title float-left">Utilisateurs du systèmes</h1>
                                <ol class="breadcrumb float-right">
                                    <li class="breadcrumb-item">Home</li>
                                    <li class="breadcrumb-item active">Utilisateurs</li>
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
                                        @can('users-create')
                                       <a role="button" href="{{ route('users.create') }}" class="btn btn-primary mb-2">
                                        Ajouter un utilisateur

                                             <span class="btn-label btn-label-right">
                                                <i class="fas fa-user"></i>
                                            </span>
                                        </a>
                                        @endcan
                                
                                </div>
                               
                                
                                @can('users-list')
                                 
                                    <div class="container">
                                    <div class="table-responsive">
                                        <table class="table table-striped" id="emptableid" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>Nom complète</th>
                                                    <th>Email</th>
                                                    <th>Telephone</th>
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
                                      url: '{{url('usersajax')}}',
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
                                      {data: "name", className: 'name'},
                                      {data: "email", className: 'emil'},
                                      {data: "tele", className: 'tele'},
                                      
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
                                    <h2>Vous n'êtes pas autorisé à voir les utilisateurs</h2>
                                    </center>
                                    @endcan

                                  </div>
                    <!-- end row-->

                </div>
                <!-- END container-fluid -->

            </div>
            <!-- END content -->

        </div>
        <!-- END content-page -->

        @endsection