@extends('layouts.layout')
@section('content')
<div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="breadcrumb-holder">
                                
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                    <div class="col-xs-12 ">
                            <div class="card mb-3">
                                        <center>
                                        @include('flash-message')
                                        </center>
                            </div>
                            <!-- end card -->
                    </div>
                        <!-- end col -->
                        <div class="col-xs-12 ">
                            <div class="card mb-3">
                        <div class="card-body">
                                  <form action="{{route('scanup', $data['emp']->id  )}}" method="post" enctype="multipart/form-data">
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
                            <option value="Contract">Contract</option>
                            <option value="Cnss">Cnss</option>
                               
                         
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
                                                            <br>
                                        <label class="custom-file-label" for="images">Choose image</label>


                                        <button type="submit" class="btn btn-primary btn-sm btn-block"><i class="fas fa-upload"></i> Upload</button>
                                    </form>
                                    </div>
                                    </div>
                                    </div>

                        
                        <div class="col-xs-12 ">

                            <div class="card mb-3">
                                <div class="card-header">
                                    <h3 style="color:red;"><i class="far fa-user"></i> : {{ $data['emp']->nom_complete }} || ( {{ $data['emp']->cin }} ) || Fonction :  ( {{ $data['emp']->fonction }} ) ||

                                @can('employees-delete')
                                {!! Form::open(['method' => 'DELETE','route' => ['emps.destroy', $data['emp']->id],'style'=>'display:inline']) !!}
                                {!! Form::submit('Supprimé', ['class' => 'btn btn-danger btn-sm','onclick'=>"return confirm('Vous etes-sur supprimé l employeé')"]) !!}
                                {!! Form::close() !!}
                                @endcan
                                @can('employees-list')
                                <a href="{{ route('emps.edit',$data['emp']->id) }}" class="btn btn-dark btn-sm"><i class="fas fa-cog"></i></a>
                                @endcan



                                    </h3>
                                </div>
                                <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Nom complèt : </label>
                                                    <input readonly class="form-control" name="name" type="text" value="{{ $data['emp']->nom_complete }}" required />
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Identité : </label>
                                                    <input readonly class="form-control" name="email" type="email" value="{{ $data['emp']->cin }}" required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                        <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Caise sociale : </label>
                                                    <input readonly class="form-control" name="id_national" type="text" value="{{ $data['emp']->cnss }}" required />
                                                </div>
                                            </div>
                                            
                                      
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Salaire : (DHS)</label>
                                                    <input readonly class="form-control" name="name" type="text" value="{{ $data['emp']->salaire_total }}" required />
                                                </div>
                                            
                                                </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>N°télèphone : </label>
                                                    <input readonly class="form-control" name="name" type="text" value="{{ $data['emp']->n_telephone }}" required />
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>N°banquer(rib) : </label>
                                                    <input readonly class="form-control" name="email" type="email" value="{{ $data['emp']->n_banquer }}" required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Prix/jour (DHS) : </label>
                                                    <input readonly class="form-control" name="name" type="text" value="{{ $data['emp']->prix_jour }}" required />
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>N°Jours : </label>
                                                    <input readonly class="form-control" name="email" type="email" value="{{ $data['emp']->n_jours }}" required />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>N°dossier : </label>
                                                    <input readonly class="form-control" name="n_dossier" type="text" value="{{ $data['emp']->n_dossier }}" required />
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Date debut : </label>
                                                    <input readonly class="form-control" name="date_debut" type="date" value="{{ Carbon\Carbon::parse($data['emp']->date_debut)->format('Y-m-d') }}" required />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Address 1 : </label>
                                                    <input readonly class="form-control" name="addr1" type="text" value="{{ $data['emp']->addr1 }}" required />
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Address 2  : </label>
                                                    <input readonly class="form-control" name="addr2" type="text" value="{{ $data['emp']->addr2 }}" required />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label>Observation  : </label>
                                                    <textarea class="form-control" readonly name="observation" id="observation" cols="30" rows="10">{{ $data['emp']->observation }}</textarea>
                                                </div>
                                            </div>
                                        </div>

                                       
                            </div>
                            <!-- end card -->

                        </div>
                        <!-- end col -->
                      <div class="card mb-3">
                                <div class="card-header">
                                    <h3 style="color:black;"><i class="fas fa-passport"></i> Employeé documents  : </h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                           <?php 
                                           $u_imgs = DB::select('select * from employeesimg where cheque_id='.$data['emp']->id);
                                            ?>
                                         
                                            @foreach ($u_imgs as $x)
                                            <div class="card-group">
                                          <div class="card">
                                            <center>
                                            <a href="/employees/{{$x->image_path}}" target="_blank" class="fas fa-file fa-7x"></a>
                                            </center>
                                            <div class="card-body">
                                              <h5 class="card-title">Nom : {{$x->name}}</h5>
                                              <p class="card-text">Type : {{$x->file_type}}</p>
                                            </div>
                                            <div class="card-footer">
                                              <small class="text-muted">Enregitré le : {{$x->created_at}}|
                                              <a href="/emp/docs/del/{{$x->id}}" style="color:red;" class="fas fa-trash"></a>
                                        </small>
                                            </div>
                                          </div>
                                          </div>
                                                                                   
                                            @endforeach

                                </div>
                                <!-- end card-body -->
                            </div>
                            <!-- end card -->
               
                </div>
                <!-- END container-fluid -->
            </div>
            <!-- END content -->
        </div>
        <!-- END content-page -->
@endsection