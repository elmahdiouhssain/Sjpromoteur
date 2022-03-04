@extends('layouts.layout')
@section('content') 
<div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="breadcrumb-holder">
                                <h1 class="main-title float-left">Edité le chèque : 
                                    {!! Form::open(['method' => 'DELETE','route' => ['stats-cheques.destroy', $cheque[0]->id],'style'=>'display:inline']) !!}
                                {!! Form::submit('Supprimé', ['class' => 'btn btn-danger btn-sm','onclick'=>"return confirm('Vous etes-sur supprimé le chèque')"]) !!}
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
                                    <h3><i class="far fa-file-image"></i> Documents (Scan)</h3>
                                </div>
                                <div class="card-body text-center">
                                    <div class="row">
                                        <div class="col-lg-12">
                                    <form action="/upload/<?php echo$cheque[0]->id; ?>" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <style>
                                        .container {
                                            max-width: 500px;
                                        }
                                        dl, ol, ul {
                                            margin: 0;
                                            padding: 0;
                                            list-style: none;
                                        }
                                        .imgPreview img {
                                            padding: 8px;
                                            max-width: 100px;
                                        } 
                                    </style>
                            <div class="form-group">
                            <label for="name">Nom du fichier :</label>
                            <select class="form-control" name="name" id="name" aria-label="Default select example">
                                  <option value="Chèque">Chèque</option>
                                  <option value="Mise à disposition">Mise à disposition</option>
                                  <option value="Autre">Autre</option>
                            </select>
                            @if ($errors->has('type_op'))
                                            <span style="color: red;">{{ $errors->first('type_op') }}</span>
                                            @endif
                            </div>
                            <div class="form-group">
                            <label for="name">Type du fichier :</label>
                            <select class="form-control" name="file_type" id="file_type" aria-label="Default select example">
                                  <option value="PDF">PDF</option>
                                  <option value="IMAGE">IMAGE</option>
                                  <option value="AUTRE">AUTRE</option>
                         
                            </select>
                            @if ($errors->has('type_op'))
                                            <span style="color: red;">{{ $errors->first('type_op') }}</span>
                                            @endif
                            </div>
                                    <div class="user-image mb-3 text-center">
                                        <div class="imgPreview"> </div>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" name="imageFile[]" class="custom-file-input" id="images" >
                                        @if ($errors->has('imageFile[]'))
                                         <span style="color: red;">{{ $errors->first('imageFile[]') }}</span>
                                            @endif
                                                
                                            <label class="custom-file-label" for="images">Choose image</label>
                                            <button type="submit" class="btn btn-primary btn-sm btn-block"><i class="fas fa-upload"></i> Upload</button>
                                    
                                        </div>
                                    </form>
                                    </div>
                                </div>
                                <!-- end card-body -->
                                <hr><hr>
                                <?php $ch_id = $cheque[0]->id; ?>
                                <?php 
                                $u_imgs = DB::select('select * from images_cheques where cheque_id='.$ch_id);?>
                                <div class="row"> 
                                @foreach ($u_imgs as $x)
                                <div class="col-lg-12">
                                            <a href="/cheques/{{$x->image_path}}" target="_blank" class="fas fa-file fa-5x"></a><br>
                                            <span>Nom : {{$x->name}}</span><br>
                                            <span>Type : {{$x->file_type}}</span>
                                            @can('cheque-delete')
                                            <span><a href="/ch/del/{{$x->id}}" style="color:red;" onclick="return confirm('Vous etes-sur supprimé le scan du fichier')" class="fas fa-trash"></a></span>
                                            @endcan
                                            </div>
                                            @endforeach  
                                </div>
                                </div>
                                <!-- end card -->
                                </div>
                                <!-- end col -->
                            <div class="card mb-3">
                                <div class="card-header">
                                    <h3><i class="fas fa-money-check-alt"></i> Chèque details : <?php echo$cheque[0]->designation; ?></h3>
                                </div>
                                <div class="card-body">
                                     <center>
                                        @include('flash-message')
                                        </center>
                            <form action="/stats-cheques/<?php echo$cheque[0]->id; ?>" method="POST">
                                        @csrf
                                        @method('PUT')
                                <div class="form-group">
                                    <label for="name">Date chèque :</label>
                                    <input type="date" name="date_cheque" class="form-control" id="date_cheque" value="<?php echo$cheque[0]->date_cheque; ?>">

                                          @if ($errors->has('date_cheque'))
                                                            <span style="color: red;">{{ $errors->first('date_cheque') }}</span>
                                                            @endif
                                                         </div>

                                <div class="form-group">
                                <label for="name">Type d'opération :</label>
                                <select class="form-control" name="type_op" id="type_op" aria-label="Default select example">
                                <option selected><?php echo$cheque[0]->type_op; ?></option>
                                <option value="Chèque">Chèque</option>
                                <option value="Virment">Virment</option>
                                <option value="Espèce">Espèce</option>
                                </select>
                                @if ($errors->has('type_op'))
                                            <span style="color: red;">{{ $errors->first('type_op') }}</span>
                                            @endif
                                </div>
                            <div class="form-group">
                                <label for="name">Designation :</label>
                                <input type="text" name="designation" class="form-control" id="designation"value="<?php echo$cheque[0]->designation; ?>">
                            @if ($errors->has('designation'))
                                            <span style="color: red;">{{ $errors->first('designation') }}</span>
                                            @endif
                            </div>
                            <div class="form-group">
                            <label for="name">Tiré/Veré (par) :</label>
                            <input type="text" name="verse_par" class="form-control" id="verse_par" value="<?php echo$cheque[0]->verse_par; ?>">

                            @if ($errors->has('verse_par'))
                                            <span style="color: red;">{{ $errors->first('verse_par') }}</span>
                                            @endif
                            </div>
                            <div class="form-group">
                            <label for="name">Numéro du marché :</label>
                            <input type="number" name="n_marche" class="form-control" id="n_marche" value="<?php echo$cheque[0]->n_marche; ?>">

                            @if ($errors->has('n_marche'))
                                            <span style="color: red;">{{ $errors->first('n_marche') }}</span>
                                            @endif
                            </div>
                            <div class="form-group">
                                <label for="societe">Sociète :</label>
                                <select class="form-control" name="societe" id="societe" aria-label="Default select example">
                            <option value="<?php echo$cheque[0]->societe; ?>"><?php echo$cheque[0]->societe; ?></option>
                            </select>
                            </div>

                            <div class="form-group">
                            <label for="name">Credit :</label>
                            <input type="number" name="credit" class="form-control" id="credit" value="<?php echo$cheque[0]->credit; ?>">
                            @if ($errors->has('credit'))
                                                <span style="color: red;">{{ $errors->first('credit') }}</span>
                                                @endif
                            </div>
                            <div class="form-group">
                            <label for="name">Débit :</label>
                            <input type="number" name="debit" class="form-control" id="debit" value="<?php echo$cheque[0]->debit; ?>">
                            @if ($errors->has('debit'))
                                            <span style="color: red;">{{ $errors->first('debit') }}</span>
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