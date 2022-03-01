@extends('layouts.layout')
@section('content') 
<script src="{{ asset('static/js/jquery.min.js') }}"></script>
<script src="{{ asset('/js/invoice.js') }}"></script>
<div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="breadcrumb-holder">
                                <h1 class="main-title float-left">Etape 2 : Selection des articles </h1>
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
                        <form action="/invoices/store/prod" method="POST">
                        @csrf
                            <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <?php $getdata2 = DB::select('select * from fournisseurs where id='.$data['facture']->fournisseurs_id); ?>
                                    <label for="supplier_id">Fournisseur :</label>
                                    <input type="text" class="form-control" name="supplier_id" id="supplier_id" value="{{ $getdata2[0]->raison_s }}">
                                </div>
                                </div>
                            </div>
                        </form>

        <!-- The Modal -->
          <div class="modal fade" id="myModal">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title"><i class="fas fa-box"></i> Ajouté une nouvelle article</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="container">
                        <input type="hidden" name="invoice_id" id="invoice_id" value="{{ $data['facture']->id }}">
                        <center>@include('flash-message')</center>
                    <div class="form-group">
                        <label>Article : </label>
                        <select class="designation form-control" name="designation" id="designation">
                            <option selected value="0">--Selectionner une article--</option>
                        @foreach ($data['products'] as $product)
                        <option value="{{ $product->nom }}"> {{ $product->nom }}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Unit : </label>
                        <select class="uml form-control" id="uml" name="uml">
                        <option value="M²">M²</option>
                        <option value="U">U</option>
                        <option value="L">L</option>
                        <option value="ML">ML</option>
                        <option value="H">H</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Qte : </label>
                        <input type="number" id="qte" name="qte" placeholder="Quantity" class="qte form-control" />
                    </div>
                    <div class="form-group">
                        <label>Prix : </label>
                        <input  type=number step=any id="p_u" name="p_u" placeholder="Price U" class="p_u form-control" />
                    </div>
                    
                    <div class="form-group">
                        <label>Total : </label>
                        <input readonly type=number step=any id="p_t"  onblur="findTotal()" name="p_t" placeholder="Total price" class="p_t form-control" />
                    </div>

                    <div class="form-group">
                        <button class="btn btn-success btn-sm btn-block add_prod_invoice" id="add_prod_invoice" name="add_prod_invoice">Ajouté</button>
                    </div>
                    </div>
                    </div>
                    <!-- Modal footer -->
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Quitté</button>
                </div>
              </div>
            </div>
          </div>

          <div class="card"><br>
          <table class="table table-bordered table-striped" >
                <thead>
                <tr>
                    <th>Produit :</th>
                    <th>U :</th>
                    <th>Qte :</th>
                    <th>Prix :</th>
                    <th>Total :</th>
                    <button type="button" name="add" id="dynamic-ar" class="btn btn-primary btn-sm btn-block" data-toggle="modal" data-target="#myModal"><i class="fas fa-plus"></i> Nouveau produit</button>
                    <a href="/factures/del/{{$data['facture']->id}}" onclick="return confirm('Vous etes-sur supprimé la facture !')" class="btn btn-warning btn-sm btn-block"><i class="fas fa-trash"></i> Supprimé la facture</a>
                    <br><center>@include('flash-message')</center><br>
                </tr>
                </thead>
                <tbody></tbody>
                  </table>
                    <div class="row">
                            <div class="col">
                                
                                <form action="/invoice/save/{{$data['facture']->id}}" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="inv_id" id="inv_id" value="{{$data['facture']->id}}">
                                    @csrf
                                <div class="form-group">
                                    <label for="total_ht">Facturé par :</label>
                                    <input readonly type=text step=any name="user_name" class="form-control" id="user_name" value="{{Auth::user()->name}}">
                                </div>

                            </div>
                                <div class="col">
                                <div class="form-group">
                                    <label for="total_ht">Total prix :</label>
                                    <input readonly  type=number step=any name="total_ht" class="total_ht form-control" id="total_ht" required="">
                                    @if ($errors->has('total_ht'))
                                    <span style="color: red;">{{ $errors->first('total_ht') }}</span>
                                    @endif
                                </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                    <label for="is_paid">Paiement :</label>
                                    <select class="is_paid form-control" id="is_paid" name="is_paid">
                                        @if ($data['facture']->is_paid)
                                        <option selected value="1" style="color:green;">Payé</option>
                                        @else
                                        <option selected value="0" style="red:green;">Encours</option>
                                        @endif
                                    <option value="1">Payé</option>
                                    <option value="0">Encours</option>
                                    </select>
                                    @if ($errors->has('is_paid'))
                                    <span style="color: red;">{{ $errors->first('is_paid') }}</span>
                                    @endif
                                    </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-danger btn-sm btn-block" type="submit"><i class="fas fa-save"></i> Enregistré</button>
                                </div>
                            </form>
                            </div>

          <!-- The Modal -->
          <div class="modal fade" id="myModal2">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="container">
                        <center><i class="fas fa-box fa-7x" style="color:green;"></i><br>
                            <h2  style="color:green;">Produit Enregistré !</h2>
                        </center>
                    </div>
              </div>
            </div>
          </div>
        </div>
        <!-- The Modal -->
          <div class="modal fade" id="myModal3">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="container">
                        <input type="hidden" id="delete_prod_id" value="#">
                        <center><i class="fas fa-trash fa-7x" style="color:red;"></i><br>
                            <h2  style="color:red;">Vois etès sur supprimé le produit de cette facture !</h2>
                        </center>
                    </div>
              </div>
              <div class="modal-footer">
                  <button class="delete_prod_btn btn btn-danger">YES</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
                  </div>
                </div>
              </div>
            </div>
            </div>
        @endsection
