@extends('layouts.layout')
@section('content')
<div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="breadcrumb-holder">
                                <h1 class="main-title float-left">Ajouté nouveau adhérant</h1>
                                <ol class="breadcrumb float-right">
                                    <li class="breadcrumb-item">Home</li>
                                    <li class="breadcrumb-item active">Ajouté nouveau adhérant</li>
                                </ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
               
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-9 col-xl-9">
                                    <center>
                                        @include('flash-message')
                                        </center>

                            <div class="card mb-3">
                                <div class="card-header">
                                    <h3><i class="far fa-user"></i> Ajouter un Adhérant</h3>
                                </div>
                                <div class="card-body">
                                    
                                    {!! Form::open(array('route' => 'adherants.store','method'=>'POST')) !!}
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
                                                    {!! Form::text('n_dossier', null, array('placeholder' => 'AG850','class' => 'form-control', 'style' => 'text-transform:uppercase;')) !!}
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
                                                {!! Form::number('montant_verse', null, array('placeholder' => '100000','class' => 'form-control')) !!}
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
                                                    {!! Form::number('m2', null, array('placeholder' => 'M2','class' => 'form-control')) !!}
                                                    @if ($errors->has('m2'))
                                                            <span style="color: red;">{{ $errors->first('m2') }}</span>
                                                            @endif
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Prix Mètre Carré (DHS)</label>
                                                    {!! Form::number('pm2', null, array('placeholder' => 'PM2','class' => 'form-control')) !!}
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
                                              <label for="sel1">Type Imo:</label>
                                              <select class="form-control" id="imm_type" name="imm_type">
                                                <option>Appartement</option>
                                                <option>Bureau</option>
                                                <option>Magasin</option>
                                           
                                              </select>
                                            </div>
                                        <div class="form-group">
                                              <label for="sel1">Étage:</label>
                                              <select class="form-control" id="etage" name="etage">
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
                                              <label for="sel1">Bloc:</label>
                                              <select class="form-control" id="bloc" name="bloc">

                                                <option>A</option>
                                                <option>B</option>
                                                <option>C</option>
                                                <option>D</option>
                                                <option>E</option>
                                                <option>F</option>
                                                <option>G</option>
                                                <option>H</option>
                                                <option>I</option>
                                              </select>
                                            </div>
                                             <div class="form-group">
                                                    <label>Coté</label>
                                                    
                                                <select class="form-control" id="cote" name="cote">
                                                <option>-----</option>
                                                <option>COTÉ RUE</option>
                                                <option>COTÉ EST</option>
                                               
                                              </select>
                                        </div>
                                            <br>
                                            <div class="form-group">
                                                <label>Sous Sol</label>
                                                <select class="form-control" id="sous_sol" name="sous_sol">
                                               
                                                <option value="1">OUI</option>
                                                <option value="0">NON</option>
                                               
                                              </select>
                                                @if ($errors->has('sous_sol'))
                                                            <span style="color: red;">{{ $errors->first('sous_sol') }}</span>
                                                            @endif
                                            </div>

                                             <div class="form-group">
                                                    <label>Amical</label>
                                       
                                                <select class="form-control" id="societe_id" name="societe_id">

                                                @foreach ($data['societes'] as $societe)

                                                <option value="{{ $societe->id }}" name="societe_id">{{ $societe->raison_social }}</option>
                                                @endforeach
                                                </select>
                                                @if ($errors->has('societe'))
                                                            <span style="color: red;">{{ $errors->first('societe') }}</span>
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