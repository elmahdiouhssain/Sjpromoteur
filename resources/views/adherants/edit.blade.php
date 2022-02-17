@extends('layouts.layout')
@section('content')
<div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="breadcrumb-holder">
                                <h1 class="main-title float-left">Modifié l' adhérant</h1>
                                
                                <ol class="breadcrumb float-right">
                                    <li class="breadcrumb-item">Home</li>
                                    <li class="breadcrumb-item active">Modifiér l'etat de l'adherant</li>
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
                                    <h3><i class="fas fa-file-word"></i> Ajouter des documents 

                                    @can('adherant-list')
                                    <a href="{{ route('adherants.show',$ads->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>
                                    @endcan

                                        @can('adherant-delete')
                                                {!! Form::open(['method' => 'DELETE','route' => ['adherants.destroy', $ads->id],'style'=>'display:inline']) !!}
                                                {!! Form::submit('Supprimé', ['class' => 'btn btn-danger btn-sm','onclick'=>"return confirm('Vous etes-sur supprimé l adherant')"]) !!}
                                                {!! Form::close() !!}
                                                @endcan
                                            </h3>
                                </div>
                                <div class="card-body">
                                    <center>
                                        @include('flash-message')
                                        </center>
                                  <form action="{{route('imageUpload', $ads->id  )}}" method="post" enctype="multipart/form-data">
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
                                  <option value="Carte national">Carte national</option>
                                  <option value="Chèque">Chèque</option>
                                  <option value="Order du virment">Order du virment</option>
                               
                         
                            </select>

                          @if ($errors->has('name'))
                                            <span style="color: red;">{{ $errors->first('name') }}</span>
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
                                    </form>
                                    </div>


                                </div>
                                <!-- end card-body -->
                            </div>
                            <!-- end card -->
                            <div class="card mb-3">
                                <div class="card-header">
                                    <h3><i class="far fa-user"></i> Modifier un Adhérant</h3>
                                </div>
                                <div class="card-body">
                                     
                                    {!! Form::model($ads, ['method' => 'PATCH','route' => ['adherants.update', $ads->id]]) !!}
                                        @csrf
                                       
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Nom complèt <span style="color:red;">(required)</span></label>
                                                    {!! Form::text('nom_complete', null, array('placeholder' => 'Nom et prénom','class' => 'form-control', 'style' => 'text-transform:uppercase;')) !!}
                                                    @if ($errors->has('nom_complete'))
                                                            <span style="color: red;">{{ $errors->first('nom_complete') }}</span>
                                                            @endif
                                                </div>
                                            </div>
                                           
                                            <div class="col-lg-6">
                                                 <div class="form-group">
                                                    <label>Identité</label>
                                                    {!! Form::text('id_national', null, array('placeholder' => 'JB00000','class' => 'form-control', 'style' => 'text-transform:uppercase;')) !!}
                                                    @if ($errors->has('id_national'))
                                                            <span style="color: red;">{{ $errors->first('id_national') }}</span>
                                                            @endif
                                                </div>
                                               
                                            </div>
                                        

                                            

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Telephone (GSM)</label>
                                                    {!! Form::text('gsm', null, array('placeholder' => 'Telephone','class' => 'form-control')) !!}
                                                    @if ($errors->has('gsm'))
                                                            <span style="color: red;">{{ $errors->first('gsm') }}</span>
                                                            @endif
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>N dossier </label>
                                                    {!! Form::text('n_dossier', null, array('placeholder' => 'AG850','class' => 'form-control')) !!}
                                                    @if ($errors->has('n_dossier'))
                                                            <span style="color: red;">{{ $errors->first('n_dossier') }}</span>
                                                            @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                <label>Montant versé(DHS) <span style="color:red;">(required)</span></label>
                                                {!! Form::number('montant_verse', null, array('placeholder' => '100000','class' => 'form-control', 'step' => 'any')) !!}
                                                @if ($errors->has('montant_verse'))
                                                            <span style="color: red;">{{ $errors->first('montant_verse') }}</span>
                                                            @endif
                                              </div>
                                              </div>

                                              <div class="col-lg-6">
                                                <div class="form-group">
                                                <label>Facade</label>
                                              <select class="form-control" id="facade" name="facade">
                                                    <option>-----</option>
                                                    <option>1FACADE</option>
                                                    <option>2FACADES</option>
                                                    <option>3FACADES</option>
                                                    <option>4FACADES</option>
                                                    <option>5FACADES</option>
                                                    <option>6FACADES</option>
                                              </select>


                                                @if ($errors->has('facade'))
                                                            <span style="color: red;">{{ $errors->first('facade') }}</span>
                                                            @endif
                                              </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                             <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Mètre Carré</label>
                                                    {!! Form::number('m2', null, array('placeholder' => 'M2','class' => 'form-control', 'step' => 'any')) !!}
                                                    @if ($errors->has('m2'))
                                                            <span style="color: red;">{{ $errors->first('m2') }}</span>
                                                            @endif
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Prix Mètre Carré (DHS)</label>
                                                    {!! Form::number('pm2', null, array('placeholder' => 'PM2','class' => 'form-control', 'step' => 'any')) !!}
                                                    @if ($errors->has('pm2'))
                                                            <span style="color: red;">{{ $errors->first('pm2') }}</span>
                                                            @endif
                                                </div>
                                               
                                            </div>
                                            <div class="col-lg-12">
                                                 <div class="form-group">
                                                    <label>Commercial</label>
                                                    {!! Form::text('commerciale', null, array('placeholder' => 'Zakaria','class' => 'form-control')) !!}
                                                    @if ($errors->has('commerciale'))
                                                            <span style="color: red;">{{ $errors->first('commerciale') }}</span>
                                                            @endif
                                                </div>
                                                <div class="form-group">
                                                    <label>Observation</label>
                                                    {!! Form::textarea('observation', null, array('class' => 'form-control', 'rows'=>'3')) !!}
                                                    @if ($errors->has('observation'))
                                                            <span style="color: red;">{{ $errors->first('observation') }}</span>
                                                            @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                                <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-save"></i> Enregisré</button>
                                        </div>
                                    

                                </div>
                                <!-- end card-body -->
                            </div>
                            <!-- end card -->
                        </div>
                        <!-- end col -->
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-3 col-xl-3">
                            <div class="card mb-3">
                                <div class="card-header">
                                    <h3><i class="far fa-file-image"></i> Superfisièr</h3>
                                </div>

                                <div class="card-body text-center">
                                    <div class="form-group">
                                              <label for="sel1">Type emo:</label>
                                              <select class="form-control" id="imm_type" name="imm_type">
                                                <option selected>{{ $ads->imm_type }}</option>
                                                <option>Appartement</option>
                                                <option>Bureau</option>
                                                <option>Magasin</option>
                                           
                                              </select>
                                            </div>
                                        
                                            <div class="form-group">
                                              <label for="sel1">Étage:</label>
                                              <select class="form-control" id="etage" name="etage">
                                                <option selected>{{ $ads->etage }}</option>
                                                <option></option>
                                                <option>في الطابق  الارضي</option>
                                                <option>في الطابق الاول</option>
                                                <option>في الطابق الثاني</option>
                                                <option>في الطابق الثالث</option>
                                                <option>في الطابق الرابع</option>
                                                <option>في الطابق الخامس</option>
                                                <option>في الطابق السادس</option>
                                                <option>في الطابق السابع</option>
                                                <option>في الطابق الثامن</option>
                                                <option>في الطابق التاسع</option>
                                                <option>في الطابق العاشر</option>
                                              </select>
                                            </div>
                                       
                                        <div class="form-group">
                                        <label for="sel1">N°IMM:</label>
                                              <select class="form-control" id="bloc" name="bloc">
                                                <option selected>{{ $ads->bloc }}</option>
                                                <option></option>
                                                <option>في العمارة 01</option>
                                                <option>في العمارة 02</option>
                                                <option>في العمارة 03</option>
                                                <option>في العمارة 04</option>
                                                <option>في العمارة 05</option>
                                                <option>في العمارة 06</option>
                                                <option>في العمارة 07</option>
                                                <option>في العمارة 08</option>
                                                <option>في العمارة 09</option>
                                              </select>
                                            </div>
                                             <div class="form-group">
                                                    <label>Coté</label>
                                               
                                                <select class="form-control" id="cote" name="cote">
                                                <option selected>{{ $ads->cote }}</option>
                                                <option>COTÉ RUE</option>
                                                <option>COTÉ EST</option>
                                               
                                              </select>
                                        </div>
                                            <br>
                                            <div class="form-group">
                                                <label>Sous Sol</label>
                                                <select class="form-control" id="sous_sol" name="sous_sol">
                                                @if ($ads->sous_sol) === 1)
                                               <option selected value="1">OUI</option>
                                               @else
                                               <option selected value="0">NON</option>
                                               @endif
                                                <option value="1">OUI</option>
                                                <option value="0">NON</option>
                                              </select>
                                            </div>
                                            <div class="form-group">
                                                    <label>Prix sous sol</label>
                                                    {!! Form::text('sousol_prix', null, array('placeholder' => '20000','class' => 'form-control')) !!}
                                                    @if ($errors->has('sousol_prix'))
                                                            <span style="color: red;">{{ $errors->first('sousol_prix') }}</span>
                                                            @endif
                                                </div>
                                            <div class="form-group">
                                                <label>Amical</label>
                                                <?php
                                                $getdata = DB::select('select * from amicals where id='.$ads->societe_id);   
                                                ?>
                                            <select class="form-control" id="societe_id" name="societe_id">
                                                <option selected value="{{ $getdata[0]->id }}" name="societe_id">{{ $getdata[0]->raison_social }}</option>
                                            @foreach ($data['societes'] as $societe)
                                            <option value="{{ $societe->id }}" name="societe_id">{{ $societe->raison_social }}</option>
                                            @endforeach
                                            </select>
                                            @if ($errors->has('societe'))
                                                        <span style="color: red;">{{ $errors->first('societe') }}</span>
                                                        @endif
                                    </div>
                                        <div class="form-group">
                                                    <label>Situation : </label>
                                       
                                            <select class="form-control" id="is_canceled" name="is_canceled">
                                                @if ($ads->is_canceled) === 1)
                                               <option selected value="1"><i class="fas fa-dot-circle"></i> Abondonné</option>
                                               @else
                                               <option selected value="0"><i class="fas fa-dot-circle"></i> Continué</option>
                                               @endif

                                                <option value="0" style="color:green;"><i class="fas fa-dot-circle"></i> Continué</option>
                                                <option value="1" style="color:red;"><i class="fas fa-dot-circle"></i> Abondonné</option>
                                                
                                            </select>
                                              @if ($errors->has('is_canceled'))
                                                            <span style="color: red;">{{ $errors->first('is_canceled') }}</span>
                                                            @endif
                                        </div>
                                        <div class="form-group">
                                                    <label>N° appartement</label>
                                                    {!! Form::text('n_appartement', null, array('placeholder' => 'n 25','class' => 'form-control')) !!}
                                                    @if ($errors->has('n_appartement'))
                                                            <span style="color: red;">{{ $errors->first('n_appartement') }}</span>
                                                            @endif
                                                </div>

                                        <div class="form-group">
                                              <label for="ville">Ville:</label>
                                              <select class="form-control" id="ville" name="ville">
                                                <option selected>{{ $ads->ville }}</option>
                                                <option>Agadir</option>
                                                <option>Tiznit</option>
                                                <option>Marakesh</option>
                                                <option>Rabat</option>
                                                <option>Tanger</option>

                                              </select>
                                            </div>
                                    </div>

                                </div>
                                 {!! Form::close() !!}
                                <!-- end card-body -->
                            </div>
                            <!-- end card -->
                        </div>
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