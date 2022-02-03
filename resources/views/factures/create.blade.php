@extends('layouts.layout')
@section('content') 
<div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="breadcrumb-holder">
                                <h1 class="main-title float-left">Nouvelle facture : </h1>
                                <ol class="breadcrumb float-right">
                                    <li class="breadcrumb-item">Home</li>
                             
                                </ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                    <div class="container">
                        
                            <div class="card mb-3">
                                <div class="card-header">
                                    <center>
                                        @include('flash-message')
                                        </center>
                                </div>
                                <div class="card-body">
                                     
                                  {!! Form::open(array('route' => 'factures.store','method'=>'POST')) !!}
                                        @csrf

            <table class="table table-bordered" id="dynamicAddRemove">
                    <label>N télèphone béneficièr : </label>
                    <input type="text" name="telephone" placeholder="+212600000" class="form-control" /><br>

                    <label>Observation du facture : </label>
                    <textarea name="description" placeholder="" class="form-control" ></textarea>
                  
                <br><tr>
                    <th>Nom produit :</th>
                    <th>Quantité :</th>
                    <th>PrixU(DHS) :</th>
                    <th>Total(DHS) :</th>
                    <button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary btn-block"><i class="fas fa-plus"></i> Ajouté un produit</button>
                </tr>
                <tr>
                    <td><input type="text" id="produit_name[0]" name="produit_name[0]" placeholder="Nom du produit" class="form-control" /></td>
                    <td><input type="text" id="quantite[0]" name="quantite[0]" placeholder="Quantité" class="form-control" /></td>
                    <td><input type="text" onkeypress="myFunction()" id="prix_u[0]" name="prix_u[0]" placeholder="PrixU" class="form-control" /></td>
                    <td><input type="text" id="total[0]" name="total[0]" placeholder="Total" class="form-control" /></td>
                    <script type="text/javascript"></script>
                    </tr>
                    </table>

                    <button type="submit" class="btn btn-outline-success btn-block"><i class="fas fa-file-invoice"></i> Genèré la facture</button>      
                    </div>
                            {!! Form::close() !!}
                                            
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