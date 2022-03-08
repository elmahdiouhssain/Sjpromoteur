@extends('layouts.layout')
@section('content')
 <div class="content-page">

            <!-- Start content -->
            <div class="content">

                <div class="container-fluid">

                    <div class="row">
                        <div class="col-xl-12">
                            <div class="breadcrumb-holder">
                                <h1 class="main-title float-left">Certificats du systèm</h1>
                                <ol class="breadcrumb float-right">
                                    <li class="breadcrumb-item">Home</li>
                                    <li class="breadcrumb-item active">Certificats du systèm</li>
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
                                        @include('flash-message')<br>
                                        @can('certificat-create')
                                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fas fa-file-word"></i> Nouvelle certificat</button>

                                        @endcan
                                        </center>
                                </div>
                                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel"> <i class="fas fa-file-alt"></i> Nouvelle certificat</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                               <div class="modal-body">
                             {!! Form::open(array('route' => 'certificats.store','method'=>'POST')) !!}
                              @csrf
                                                    
                                 <div class="form-group">
                                    <label for="name">Certificat titre :</label>
                                    <input type="text" name="cert_titre" class="form-control" id="cert_titre" placeholder="Titre" required="">

                                          @if ($errors->has('cert_titre'))
                                                            <span style="color: red;">{{ $errors->first('cert_titre') }}</span>
                                                            @endif
                                                         </div>
                                            <div class="form-group">
									          <label for="body">Certificat contenu  :</label>
									          <textarea class="ckeditor form-control" name="cert_body" id="cert_body"></textarea>
									                @if ($errors->has('cert_body'))
									                                  <span style="color: red;">{{ $errors->first('cert_body') }}</span>
									                                  @endif
									              </div>
				                            <div class="form-group">
				                                <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-save"></i> Enregistré</button>

				                            </div>
				                            {!! Form::close() !!}
                             					</div>

                                                </div>
                                            
                                            </div>
                                        </div>
                                        @can('certificat-list')
                            <div class="card-body">
                                <div class="card-deck">
                                	@foreach ($data['certificats'] as $cert)
								  <div class="card">
								    <div class="card-body">
								      <h5 class="card-title">{{ $cert->cert_titre }}</h5>
								      <p class="card-text"><small class="text-muted">

								      	<i class="fas fa-clock"></i> {{ $cert->created_at }}</small> ||@can('certificat-delete') 
								      	{!! Form::open(['method' => 'DELETE','route' => ['certificats.destroy', $cert->id],'style'=>'display:inline']) !!}
                                        {!! Form::submit('Supprimé', ['class' => 'btn btn-danger btn-sm','onclick'=>"return confirm('Vous etes-sur supprimé la certificat')"]) !!}
                                        {!! Form::close() !!} @endcan|| <a href="/certificats/{{$cert->id}}" target="_blank" class="btn btn-primary fas fa-eye"></a>
								      </p>
								    </div>
								  </div>
								  @endforeach
    								</div>
                                </div>
                                <!-- end card-body-->
                                @endcan
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