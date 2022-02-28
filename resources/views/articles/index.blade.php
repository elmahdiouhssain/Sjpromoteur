@extends('layouts.layout')
@section('content')
 <div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="breadcrumb-holder">
                                <h1 class="main-title float-left">List des articles</h1>
                                <ol class="breadcrumb float-right">
                                    <li class="breadcrumb-item">Home</li>
                                    <li class="breadcrumb-item active">Les articles</li>
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
                                        @can('suppliers-create')
                                       <a role="button" href=""  data-toggle="modal" data-target="#exampleModal" class="btn btn-dark mb-2" >
                                        Ajouter une article
                                             <span class="btn-label btn-label-right">
                                                <i class="fas fa-cube"></i>
                                            </span>
                                        </a>
                                        @endcan
                                        <br>
                                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel"> <i class="fas fa-cube"></i> Ajouter une article</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                            <div class="modal-body">
                             {!! Form::open(array('route' => 'articles.store','method'=>'POST')) !!}
                              @csrf
                            <div class="form-group">
                                <label>Nom d'article: </label>
                                <input style="text-transform:uppercase;" type="text" name="nom" id="nom" class="form-control">
                                @if ($errors->has('nom'))
                                            <span style="color: red;">{{ $errors->first('nom') }}</span>
                                            @endif
                            </div>

                            <div class="form-group">
                            <label for="unitaire">Unitaire :</label>
                            <input type="text" name="unitaire" class="form-control" id="unitaire" placeholder="M²,ML,ML">

                          @if ($errors->has('unitaire'))
                                            <span style="color: red;">{{ $errors->first('unitaire') }}</span>
                                            @endif
                            </div>

                            <div class="form-group">
                            <label for="name">Prix :</label>
                            <input type=number step=any name="prix" class="form-control" id="prix" placeholder="20.665(DHS)">

                          @if ($errors->has('prix'))
                                            <span style="color: red;">{{ $errors->first('prix') }}</span>
                                            @endif
                            </div>
                            <div class="form-group">
                            <label for="tva">Tva :</label>
                            <input type=number step=any name="tva" class="form-control" id="tva" placeholder="10% (DHS)">

                          @if ($errors->has('prix'))
                                            <span style="color: red;">{{ $errors->first('tva') }}</span>
                                            @endif
                            </div>
                            <div class="form-group">
                            <label for="desc">Description :</label>
                            <textarea class="form-control" name="desc" id="desc"></textarea>

                          @if ($errors->has('desc'))
                                            <span style="color: red;">{{ $errors->first('desc') }}</span>
                                            @endif
                            </div>
                            <div class="form-group">
                            <label for="name">Observation :</label>
                            <textarea class="form-control" name="observations" id="observations"></textarea>

                          @if ($errors->has('observations'))
                                            <span style="color: red;">{{ $errors->first('observations') }}</span>
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
                                    <br>
                                    </center><br>
                                    <div class="container">
                                        @can('suppliers-list')
                                    <div class="table-responsive">
                                        <table class="table table-striped" id="emptableid" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>Nom d'article</th>
                                                    <th>Unitaire</th>
                                                    <th>Prix (DHS)</th>
                                                    <th>Tva</th>
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
                                                      url: '{{url('articlesajax')}}',
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
                                                      {data: "nom", className: 'nom'},
                                                      {data: "unitaire", className: 'unitaire'},
                                                      {data: "prix", className: 'prix'},
                                                      {data: "tva", className: 'tva'},
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
                                    <h2>Vous n'êtes pas autorisé à voir les articles</h2>
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

  





