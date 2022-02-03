@extends('layouts.layout')
@section('content')
 <div class="content-page">

            <!-- Start content -->
            <div class="content">

                <div class="container-fluid">

                    <div class="row">
                        <div class="col-xl-12">
                            <div class="breadcrumb-holder">
                                <h1 class="main-title float-left">Cheques</h1>
                                <ol class="breadcrumb float-right">
                                    <li class="breadcrumb-item">Home</li>
                                    <li class="breadcrumb-item active">Cheques</li>
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
                              
                                       <a role="button" href="#" class="btn btn-danger mb-2" data-toggle="modal" data-target="#exampleModal">
                                        Ajouter Nouveau chèque

                                             <span class="btn-label btn-label-right">
                                                <i class="fas fa-file-alt"></i>
                                            </span>
                                        </a>
                                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel"> <i class="fas fa-file-alt"></i> Ajouter Nouveau chèque</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                     <form method="POST" class="newline" id="newline" action="{{url('/dashboard/cheque')}}">
                                                    @csrf
        
                                            <div class="form-group">
                                    <label for="name">Nom&Prenom :</label>
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
                                       </form>


                                    <div class="table-responsive">
                                        <table id="example" class="display" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Nom&prénom</th>
                                                    <th>N cheque</th>
                                                    <th>Status</th>
                                                    <th>Montant</th>
                                                    <th>Enregitré le</th>
                                                    <th>Réglage</th>
                                                </tr>
                                            </thead>
                                             <tbody>
                                            @foreach ($data['cheques'] as $cheque)
                                            <tr>
                                                <td>{{ $cheque->name }}</td>
                                                <td>{{ $cheque->number }}</td>
                                                <td>{{ $cheque->status }}</td>
                                                <td>{{ $cheque->balance }} DHS</td>
                                                <td>{{ $cheque->created_at }}</td>
                                                <td>
                                                    <a href="/dashboard/cheque/edit/{{ $cheque->id }}" class="fas fa-file-alt"></a>
                                                 
                                                  <a style="color: red;" href="/dashboard/cheque/del/{{ $cheque->id }}" onclick="return confirm('Vous etez sur supprimé le chèque ?')" class="fas fa-trash">
                                                  </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </table>
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