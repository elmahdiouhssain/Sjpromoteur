@extends('layouts.layout')
@section('content')
<div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="breadcrumb-holder">
                                <h1 class="main-title float-left">Edité le chèque : </h1>
                                <ol class="breadcrumb float-right">
                                    <li class="breadcrumb-item">Home</li>
                             
                                </ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-9 col-xl-9">
                            <div class="card mb-3">
                                <div class="card-header">
                                    <h3><i class="far fa-user"></i> Chèque details : <?php echo$cheque[0]->number; ?></h3>
                                </div>
                                <div class="card-body">
                                     <center>
                                        @include('flash-message')
                                        </center>
                                    <form method="POST" class="newline" id="newline" action="/dashboard/cheque/edit/<?php echo$cheque[0]->id; ?>">
                                                    @csrf
        
                                            <div class="form-group">
                                    <label for="name">Nom&Prenom :</label>
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Nom complet" value="<?php echo$cheque[0]->name; ?>">

                                          @if ($errors->has('name'))
                                                            <span style="color: red;">{{ $errors->first('name') }}</span>
                                                            @endif
                                                         </div>

                                             <div class="form-group">
                                                    <label for="name">Numéro :</label>
                                                    <input type="number" name="number" class="form-control" id="number" placeholder="EX : 787654566543" value="<?php echo$cheque[0]->number; ?>">

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
                    <label for="name">Montant : DHS</label>
                    <input type="number" name="balance" class="form-control" id="balance" placeholder="Balance DHS"value="<?php echo$cheque[0]->balance; ?>">

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

                                </div>
                                <!-- end card-body -->
                            </div>
                            <!-- end card -->
                        </div>
                        <!-- end col -->
                    
                        <!-- end col -->
                    </div>
                    <!-- end row -->
                </div>
                <!-- END container-fluid -->
            </div>
            <!-- END content -->
        </div>
        <!-- END content-page -->
@endsection