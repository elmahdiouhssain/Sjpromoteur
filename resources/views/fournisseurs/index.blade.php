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
                                       
                                    
                                       <a role="button" href=""  data-toggle="modal" data-target="#exampleModal" class="btn btn-dark mb-2" >
                                        Ajouter un fournisseur
                                             <span class="btn-label btn-label-right">
                                                <i class="fas fa-boxes"></i>
                                            </span>
                                        </a><br>



                                         <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel"> <i class="fas fa-boxes"></i> Ajouter un fournisseur</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                            <div class="modal-body">
                             {!! Form::open(array('route' => 'fournisseurs.store','method'=>'POST')) !!}
                              @csrf


                            <div class="form-group">
                                                    <label for="name">Raison social :</label>
                                                    <input type="text" name="raison_s" class="form-control" id="raison_s"required="">

                          @if ($errors->has('raison_s'))
                                            <span style="color: red;">{{ $errors->first('raison_s') }}</span>
                                            @endif
                            </div>
                            <div class="form-group">
                                                    <label for="name">Ice:</label>
                                                    <input type="text" name="ice" class="form-control" id="ice">

                          @if ($errors->has('ice'))
                                            <span style="color: red;">{{ $errors->first('ice') }}</span>
                                            @endif
                            </div>
                            <div class="form-group">
                                                    <label for="name">Addresse :</label>
                                                    <input type="text" name="addr1" class="form-control" id="addr1">

                          @if ($errors->has('addr1'))
                                            <span style="color: red;">{{ $errors->first('addr1') }}</span>
                                            @endif
                            </div>

                            <div class="form-group">
                            <label for="name">Télèphone :</label>
                            <input type="text" name="n_telephone" class="form-control" id="n_telephone" placeholder="+21260000000">

                          @if ($errors->has('n_telephone'))
                                            <span style="color: red;">{{ $errors->first('n_telephone') }}</span>
                                            @endif
                            </div>
                            <div class="form-group">
                            <label for="name">Email :</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="test@gmail.com">

                          @if ($errors->has('email'))
                                            <span style="color: red;">{{ $errors->first('email') }}</span>
                                            @endif
                            </div>
                            <div class="form-group">
                            <label for="name">Rib bancaire :</label>
                            <input type="text" name="c_bancaire" class="form-control" id="c_bancaire" placeholder="02336547889">

                          @if ($errors->has('c_bancaire'))
                                            <span style="color: red;">{{ $errors->first('c_bancaire') }}</span>
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
                                      url: '{{url('fournisseursajax')}}',
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

  





