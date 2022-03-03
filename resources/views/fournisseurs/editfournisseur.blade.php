@extends('layouts.layout')
@section('content') 
<div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="breadcrumb-holder">
                                <h1 class="main-title float-left">Edité le Fournisseur : 
                                    {!! Form::open(['method' => 'DELETE','route' => ['fournisseurs.destroy', $fournisseur[0]->id],'style'=>'display:inline']) !!}
                                {!! Form::submit('Supprimé', ['class' => 'btn btn-danger btn-sm','onclick'=>"return confirm('Vous etes-sur supprimé le fournisseur')"]) !!}
                                {!! Form::close() !!}</h1>
                                <ol class="breadcrumb float-right">
                                    <li class="breadcrumb-item">Home</li>
                             
                                </ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                    <div class="row">
                        <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 mx-auto text-center form p-4">
                            <div class="card mb-3">
                                <div class="card-header">
                                    <h3><i class="fas fa-boxes"></i> Fournisseur details : <?php echo$fournisseur[0]->raison_s; ?></h3>
                                </div>
                                <div class="card-body">
                                     <center>
                                        @include('flash-message')
                                        </center>
                        <form action="/fournisseurs/<?php echo$fournisseur[0]->id; ?>" method="POST">
                                        @csrf
                                        @method('PUT')
    
                                                    
                                  <div class="form-group">
                                                    <label for="name">Raison social :</label>
                                                    <input type="text" name="raison_s" class="form-control" id="raison_s" value="<?php echo$fournisseur[0]->raison_s; ?>">

                          @if ($errors->has('raison_s'))
                                            <span style="color: red;">{{ $errors->first('raison_s') }}</span>
                                            @endif
                            </div>
                            <div class="form-group">
                                                    <label for="name">Ice:</label>
                                                    <input type="text" name="ice" class="form-control" id="ice" value="<?php echo$fournisseur[0]->ice; ?>">

                          @if ($errors->has('ice'))
                                            <span style="color: red;">{{ $errors->first('ice') }}</span>
                                            @endif
                            </div>
                            <div class="form-group">
                                                    <label for="name">Addresse :</label>
                                                    <input type="text" name="addr1" class="form-control" id="addr1" value="<?php echo$fournisseur[0]->addr1; ?>">

                          @if ($errors->has('addr1'))
                                            <span style="color: red;">{{ $errors->first('addr1') }}</span>
                                            @endif
                            </div>

                            <div class="form-group">
                            <label for="name">Télèphone :</label>
                            <input type="text" name="n_telephone" class="form-control" id="n_telephone" value="<?php echo$fournisseur[0]->n_telephone; ?>">

                          @if ($errors->has('n_telephone'))
                                            <span style="color: red;">{{ $errors->first('n_telephone') }}</span>
                                            @endif
                            </div>
                            <div class="form-group">
                            <label for="name">Email :</label>
                            <input type="email" name="email" class="form-control" id="email" value="<?php echo$fournisseur[0]->email; ?>">

                          @if ($errors->has('email'))
                                            <span style="color: red;">{{ $errors->first('email') }}</span>
                                            @endif
                            </div>
                            <div class="form-group">
                            <label for="name">Rib bancaire :</label>
                            <input type="text" name="c_bancaire" class="form-control" id="c_bancaire" value="<?php echo$fournisseur[0]->c_bancaire; ?>">

                          @if ($errors->has('c_bancaire'))
                                            <span style="color: red;">{{ $errors->first('c_bancaire') }}</span>
                                            @endif
                            </div>
                            <div class="form-group">
                            <label for="name">Observation :</label>
                            <textarea class="form-control" name="observations" id="observations"><?php echo$fournisseur[0]->observations; ?></textarea>

                          @if ($errors->has('observations'))
                                            <span style="color: red;">{{ $errors->first('observations') }}</span>
                                            @endif
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-save"></i> Enregistré</button>

                                </div>
                             </div>
                             </form>

                                                </div>
                                            
                                            </div>


                                    </div>
                                     

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