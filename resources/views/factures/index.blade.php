@extends('layouts.layout')
@section('content')
 <div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="breadcrumb-holder">
                                <h1 class="main-title float-left">Factures</h1>
                                <ol class="breadcrumb float-right">
                                    <li class="breadcrumb-item">Home</li>
                                    <li class="breadcrumb-item active">Factures</li>
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
                                    @can('facture-create')
                                       <a role="button" href="{{ route('factures.create') }}" class="btn btn-danger mb-2">
                                        Ajouter une facture
                                             <span class="btn-label btn-label-right">
                                                <i class="fas fa-file-invoice"></i>
                                            </span>
                                        </a>
                                        @endcan
                                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel"> <i class="fas fa-file-invoice"></i> Ajouter une facture</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                            <div class="modal-body">   
                             {!! Form::open(array('route' => 'factures.store','method'=>'POST')) !!}
                              @csrf
                                <div class="form-group">
                                    <label for="name">Nom & Prenom :</label>
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Fullname" required="">
                                        @if ($errors->has('name'))
                                                    <span style="color: red;">{{ $errors->first('name') }}</span>
                                                    @endif
                                                    </div>

                                    <div class="form-group">
                                            <label for="name">Numéro :</label>
                                            <input type="number" name="number" class="form-control" id="number" placeholder="EX : 787654566543"required="">
                                @if ($errors->has('number'))
                                            <span style="color: red;">{{ $errors->first('number') }}</span>
                                            @endif
                                </div>
                                <div class="form-group">
                                <label for="name">Status :</label>
                                <select class="form-select" name="status" id="status" aria-label="Default select example">
                                  <option value="Payé"> Payé</option>
                                  <option value="En attend">En attend</option>
                                </select>
                                </div>

                            <div class="form-group">
                            <label for="name">Montant :</label>
                            <input type="number" name="balance" class="form-control" id="balance" placeholder="Balance DHS"required="">
                            @if ($errors->has('balance'))
                                            <span style="color: red;">{{ $errors->first('balance') }}</span>
                                            @endif
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-save"></i> Enregistré</button>
                                </div>
                             </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                      {!! Form::close() !!}
                                    <div class="container">
                                        @can('facture-list')
                                    <div class="table-responsive">
                                        <table class="table table-striped" id="emptableid" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>N°</th>
                                                    <th>Libelle</th>
                                                    <th>Type</th>
                                                    <th>Date</th>
                                                    <th>Total(DHS)</th>
                                                    <th>Réalise par</th>
                                                    <th>Status</th>
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
                                                      url: '{{url('factureajax')}}',
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
                                                      {data: "uuid", className: 'uuid'},
                                                      {data: "f_libelle", className: 'f_libelle'},
                                                      {data: "type_facture", className: 'type_facture'},
                                                      {data: "relase_date", className: 'relase_date'},
                                                      {data: "total_ht", className: 'total_ht'},
                                                      {data: "realise_par", className: 'realise_par'},
                                                      {data: "is_paid", 
                                                       render : function(data,type,row){
                                                                            var label;
                                                                            if(data == "1"){
                                                                                return '<label class="badge badge-success">Payé</label>'
                                                                            }else{
                                                                                return '<label class="badge badge-warning">Encours</label>'
                                                                            }
                                                                        },
                                                      className: 'is_paid'},
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
                                    <h2>Vous n'êtes pas autorisé à voir les factures</h2>
                                    </center>
                                    @endcan
                                    </div>
                                    <!-- end table-responsive-->

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