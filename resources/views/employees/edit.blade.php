@extends('layouts.layout')
@section('content')
<div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="breadcrumb-holder">
                                <h1 class="main-title float-left">Modifié un employeé</h1> 
                                @can('employees-delete')
                                {!! Form::open(['method' => 'DELETE','route' => ['emps.destroy', $emp->id],'style'=>'display:inline']) !!}
                                {!! Form::submit('Supprimé', ['class' => 'btn btn-danger btn-sm','onclick'=>"return confirm('Vous etes-sur supprimé l employeé')"]) !!}
                                {!! Form::close() !!}
                                @endcan
                                @can('employees-list')
                                <a href="{{ route('emps.show',$emp->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>
                                @endcan
                                <ol class="breadcrumb float-right">
                                    <li class="breadcrumb-item">Home</li>
                                    <li class="breadcrumb-item active">Modifié un employeé</li>
                                    
                                </ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                    <div class="row">
                        <div class="container">
                            <div class="card mb-3">
                                <div class="card-header">
                                    <h3><i class="fas fa-dolly"></i> Modifié employeé</h3>
                                </div>
                                <div class="card-body">
                                     <center>
                                        @include('flash-message')
                                        </center>
                                   
                                    {!! Form::model($emp, ['method' => 'PATCH','route' => ['emps.update', $emp->id]]) !!}
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Nom complèt</label>
                                                    {!! Form::text('nom_complete', null, array('placeholder' => 'Nom et prénom','class' => 'form-control', 'style' => 'text-transform:uppercase;')) !!}
                                                    @if ($errors->has('nom_complete'))
                                                            <span style="color: red;">{{ $errors->first('nom_complete') }}</span>
                                                            @endif
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Fonction</label>
                                        <select class="form-control" name="fonction" id="fonction" aria-label="Default select example">
                                        <option value="Macon">Macon</option>
                                        <option value="Ouvrier">Ouvrier</option>
                                        <option value="Féreilleur">Féreilleur</option>
                                        <option value="Sécurité">Sécurité</option>
                                        <option value="Autre">Autre</option>
                                        </select>

                                                    @if ($errors->has('fonction'))
                                                            <span style="color: red;">{{ $errors->first('fonction') }}</span>
                                                            @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Identité (cin)</label>
                                                    {!! Form::text('cin', null, array('placeholder' => 'Y80000','class' => 'form-control', 'style' => 'text-transform:uppercase;')) !!}
                                                    @if ($errors->has('cin'))
                                                            <span style="color: red;">{{ $errors->first('cin') }}</span>
                                                            @endif
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Cnss</label>
                                                    {!! Form::text('cnss', null, array('placeholder' => 'nf555000','class' => 'form-control', 'style' => 'text-transform:uppercase;')) !!}
                                                    @if ($errors->has('cnss'))
                                                            <span style="color: red;">{{ $errors->first('cnss') }}</span>
                                                            @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                               <div class="form-group">
                                                    <label>Cin Validation date</label>
                                                    <input placeholder="" class="form-control" name="cin_validation" type="date" value="{{ Carbon\Carbon::parse($emp->cin_validation)->format('Y-m-d') }}">
                                                    @if ($errors->has('cin_validation'))
                                                            <span style="color: red;">{{ $errors->first('cin_validation') }}</span>
                                                            @endif
                                                </div> 
                                            </div>
                                            <div class="col-lg-6">
                                               <div class="form-group">
                                                    <label>Date naissance</label>
                                                    <input placeholder="" class="form-control" name="date_n" type="date" value="{{ Carbon\Carbon::parse($emp->date_n)->format('Y-m-d') }}">
                                                    @if ($errors->has('date_n'))
                                                            <span style="color: red;">{{ $errors->first('date_n') }}</span>
                                                            @endif
                                                </div> 
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>N°télèphone</label>
                                                    {!! Form::text('n_telephone', null, array('placeholder' => '+2126000000','class' => 'form-control')) !!}
                                                    @if ($errors->has('n_telephone'))
                                                            <span style="color: red;">{{ $errors->first('n_telephone') }}</span>
                                                            @endif
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Rib</label>
                                                    {!! Form::text('n_banquer', null, array('placeholder' => '0000111122223333444','class' => 'form-control')) !!}
                                                    @if ($errors->has('n_banquer'))
                                                            <span style="color: red;">{{ $errors->first('n_banquer') }}</span>
                                                            @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>N°dossier</label>
                                                    {!! Form::text('n_dossier', null, array('placeholder' => 'em00001','class' => 'form-control', 'style' => 'text-transform:uppercase;')) !!}
                                                    @if ($errors->has('n_dossier'))
                                                            <span style="color: red;">{{ $errors->first('n_dossier') }}</span>
                                                            @endif
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Addresse 1</label>
                                                    {!! Form::text('addr1', null, array('placeholder' => '','class' => 'form-control')) !!}
                                                    @if ($errors->has('addr1'))
                                                            <span style="color: red;">{{ $errors->first('addr1') }}</span>
                                                            @endif
                                                </div>
                                            </div>
                                            
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Addresse 2 </label>
                                                    {!! Form::text('addr2', null, array('placeholder' => '04 alqods ','class' => 'form-control')) !!}
                                                    @if ($errors->has('addr2'))
                                                            <span style="color: red;">{{ $errors->first('addr2') }}</span>
                                                            @endif
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Addresse 3 </label>
                                                    {!! Form::text('addr3', null, array('placeholder' => '04 alqods ','class' => 'form-control')) !!}
                                                    @if ($errors->has('addr3'))
                                                            <span style="color: red;">{{ $errors->first('addr3') }}</span>
                                                            @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                            <div class="form-group">
                                                    <label>Sociète </label>
                                                    <select class="form-control" id="company_id" name="company_id">
                                            <?php $getdata = DB::select('select * from companys where id='.$emp->company_id);  ?>
                                                <option value="{{$getdata[0]->id}}" selected>{{$getdata[0]->raison_social}}</option>

                                                    @foreach ($data['societes'] as $so)
                                                    <option value="{{$so->id}}">{{$so->raison_social}}</option>
                                                    @endforeach

                                              </select>
                                                    @if ($errors->has('company_id'))
                                                            <span style="color: red;">{{ $errors->first('addr3') }}</span>
                                                            @endif
                                                </div>
                                                </div>

                                                <div class="col-lg-6">
                                            <div class="form-group">
                                                    <label>Date debut (travaille)</label>
                                                    <input placeholder="" class="form-control" name="date_debut" type="date" value="{{ Carbon\Carbon::parse($emp->date_debut)->format('Y-m-d') }}">
                                                    @if ($errors->has('date_debut'))
                                                            <span style="color: red;">{{ $errors->first('date_debut') }}</span>
                                                            @endif
                                                </div>
                                                </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label>Prix par jour (DHS) </label>
                                                    {!! Form::number('prix_jour', null, array('placeholder' => ' ','class' => 'form-control')) !!}
                                                    @if ($errors->has('prix_jour'))
                                                            <span style="color: red;">{{ $errors->first('prix_jour') }}</span>
                                                            @endif
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label>Observation </label>
                                                    {!! Form::textarea('observation', null, array('placeholder' => ' ','class' => 'form-control')) !!}
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