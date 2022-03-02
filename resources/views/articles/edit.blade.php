@extends('layouts.layout')
@section('content') 
<div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="breadcrumb-holder">
                                <h1 class="main-title float-left">Edité l'article : 
                                    <a href='/articles/del/<?php echo$article[0]->id; ?>' class='btn btn-danger fas fa-trash btn-sm'></a></h1>
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
                 
                            <div class="card">
                            <div class="card mb-3">
                                <div class="card-header">
                                    <h3><i class="fas fa-money-check-alt"></i> Article details : <?php echo$article[0]->nom; ?></h3>
                                </div>
                                <div class="card-body">
                                     <center>
                                        @include('flash-message')
                                        </center>
                        <form action="/articles/<?php echo$article[0]->id; ?>" method="POST">
                                        @csrf
                                        @method('PUT')

                            <div class="form-group">
                                <label for="name">Nom de l'article :</label>
                                <input type="text" name="nom" class="form-control" id="nom"value="<?php echo$article[0]->nom; ?>">

                          @if ($errors->has('nom'))
                                            <span style="color: red;">{{ $errors->first('nom') }}</span>
                                            @endif
                            </div>
                            <div class="form-group">
                            <label for="name">Unitaire :</label>
                            <input type="text" name="unitaire" class="form-control" id="unitaire" value="<?php echo$article[0]->unitaire; ?>">

                          @if ($errors->has('unitaire'))
                                            <span style="color: red;">{{ $errors->first('unitaire') }}</span>
                                            @endif
                            </div>
                            <div class="form-group">
                            <label for="name">Prix de l'article (DHS):</label>
                            <input type="number" name="prix" class="form-control" id="prix" value="<?php echo$article[0]->prix; ?>">

                          @if ($errors->has('prix'))
                                            <span style="color: red;">{{ $errors->first('prix') }}</span>
                                            @endif
                            </div>

                            
                    <div class="form-group">
                    <label for="name">Prix tva (DHS):</label>
                    <input type="number" name="tva" class="form-control" id="prix" value="<?php echo$article[0]->prix; ?>">

                          @if ($errors->has('prix'))
                                            <span style="color: red;">{{ $errors->first('prix') }}</span>
                                            @endif
                    </div>
                    <div class="form-group">
                    <label for="name">Description :</label>
                    <textarea class="form-control" id="desc" name="desc"><?php echo$article[0]->desc; ?></textarea>

                          @if ($errors->has('desc'))
                                            <span style="color: red;">{{ $errors->first('desc') }}</span>
                                            @endif
                            </div>
                    <div class="form-group">
                    <label for="name">Observation :</label>
                    <textarea class="form-control" id="observations" name="observations"><?php echo$article[0]->observations; ?></textarea>

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
                        </div>
                    </div>
                    <!-- end row -->
                </div>
                <!-- END container-fluid -->
            </div>
            <!-- END content -->
        </div>
        <!-- END content-page -->
@endsection