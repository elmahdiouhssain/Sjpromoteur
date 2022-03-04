$(document).ready(function (){
                fetchpaiements();
                function fetchpaiements(){
                    var emp_id = $('.employee_id').val();
                    $.ajax({
                        type:"GET",
                        url:"/employees/paiement/all/"+emp_id,
                        dataType:"json",
                        success:function (response){
                            $('.card-deck').html("");
                            var i = 0;
                            $.each(response, function(key, item){
                                ++i;
                                $('.card-deck').append('<div class="card">\
                                    <div class="card-body">\
                                    <h5 class="card-title">Montant : '+item.salaire_total+'(DHS)</h5>\
                                    <p>Debut : '+item.debut+'</p>\
                                    <p>Fin : '+item.fin+'</p>\
                                    <p>N°jrs : '+item.n_jours+'</p>\
                                    <p>P/jr : '+item.prix_jour+'(DHS)</p>\
                                    <p>Realisé par : '+item.realise_par+'</p>\
                                    <p class="card-text">Observation : '+item.observation+'.</p>\
                                    <p>Status : <label class="badge badge-success">PAYEE</label></p>\
                                    </div>\<div class="card-footer">\
                                    <small class="text-muted">Enregitré à : '+item.created_at+' <button style="color:red;" class="delete_paiement fas fa-trash" data-id="'+item.id+'" value="'+item.id+'"></button></small>\
                                    </div>\
                                    </div>');

                                });
                            //console.log(response);
                                }
                            });
                        };
                    
                    $(document).on('click', '.add_paiement', function (e){
                    e.preventDefault();
                    var data = {
                        'employee_id':$('.employee_id').val(),
                        'debut':$('.debut').val(),
                        'fin':$('.fin').val(),
                        'observation':$('.observation').val(),
                        'n_jours':$('.n_jours').val(),
                        'prix_jour':$('.prix_jour').val(),
                        'salaire_total':$('.salaire_total').val(),
                    }
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type:"POST",
                        url:"/employees/store/paiement",
                        data:data,
                        dataType:"json",
                        success:function (response){
                            if(response.status == 400){
                                $('#savedform_errList').html("");
                                $('#savedform_errList').addClass('alert alert-danger');
                                $.each(response.errors, function (key, err_values){
                                    $('#savedform_errList').append('<span>'+err_values+'</span>');
                                });
                            }
                            else{
                                $('#success_message').addClass('alert alert-success');
                                $('#success_message').text(response.message);
                                $('#exampleModal').modal('hide');
                                $('#myModal2').modal('show');
                                $("#debut").val("");
                                $("#fin").val("");
                                $("#observation").val("");
                                $("#n_jours").val("");
                                $("#prix_jour").val("");
                                $("#salaire_total").val("");
                                fetchpaiements();
                            }
                        }
                    })
                })

                $(document).on('click', '.delete_paiement', function(e){
                e.preventDefault();
                var paiement_id = $(this).val();
                $('#delete_paiement_id').val(paiement_id);
                $('#myModal3').modal('show');

                });
                $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                $(document).on('click', '.delete_paiement_btn', function(e){
                  
                    e.preventDefault();
                    var paiement_id = $('#delete_paiement_id').val();
                    $.ajax({
                        type:"DELETE",
                        url:"/employees/paiement/del/"+paiement_id,
                        data: {paiement_id:paiement_id},
                        success: function (response){
                            $('#success_message').addClass('alert alert-success')
                            $('#success_message').text(response.message);
                            $('#myModal3').modal('hide');
                            fetchpaiements();
                        }
                    })
                })

            });