            $(document).ready(function (){
                fetchinvprod();
                function fetchinvprod(){
                    var full_url_invoice = document.URL;
                    //var idofinvoicee = full_url_invoice.substring(full_url_invoice.lastIndexOf('/') + 1);
                    var idofinvoicee = $('#invoice_id').val();
                    //console.log(idofinvoicee);
                    $.ajax({
                        type:"GET",
                        url:"/invoicesprod/json/"+idofinvoicee,
                        dataType:"json",
                        success:function (response){
                            //console.log(response);
                            $('tbody').html("");
                            var i = 0;
                            $.each(response, function(key, item){
                                ++i;
                                $('tbody').append('<tr>\
                                    <td><input readonly type="text" id="designation" name="designation" value="'+item.designation+'" class="form-control" /></td>\
                                    <td><input readonly type="text" id="uml" name="uml" value="'+item.uml+'" class="form-control" /></td>\
                                    <td><input readonly type="number" id="qte" name="qte" class="form-control" value="'+item.qte+'" /></td>\
                                    <td><input readonly type="text" id="p_u" name="p_u" class="form-control" value="'+item.p_u+'"/></td>\
                                    <td><input readonly type="text" id="p_t['+i+']" name="p_t[]" class="p_t form-control" value="'+item.p_t+'"/></td>\
                                    <td><a class="fas fa-trash" style="color:red;" href="/invoices/prod/del/'+item.id+'" data-toggle="modal" data-target="#myModal3"></a><input type="hidden" name="prod_invoice_id" id="prod_invoice_id" value="'+item.id+'" ">\
                                    </td></tr>');
                                        var sum = 0;
                                        $("input[class *= 'p_t']").each(function(){
                                            sum += +$(this).val();
                                        });
                                        $(".total_ht").val(sum);
                                        //console.log(sum);
                                     });
                                    }
                                    });
                                    }

                                    
                        $(document).on('click', '.delete_prod', function(e){
                            e.preventDefault();
                            var prod_id = $(this).val();
                            $('#delete_prod_id').val(prod_id);
                            $('#myModal3').modal('show');

                        });
                        $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });
                        $(document).on('click', '.delete_prod_btn', function(e){
                            e.preventDefault();
                            var prod_id = $('#prod_invoice_id').val();
                            $.ajax({
                                type:"DELETE",
                                url:"/invoices/prod/del/"+prod_id,
                                data: {prod_id:prod_id},
                                success: function (response){
                                    console.log(response);
                                    $('#success_message').addClass('alert alert-success')
                                    $('#success_message').text(response.message);
                                    $('#myModal3').modal('hide');
                                    fetchinvprod();
                                }
                            })
                        })
                        $(document).on('click', '.add_prod_invoice', function (e){
                            e.preventDefault();
                            var full_url = document.URL;
                            var idofinvoice = $('#invoice_id').val();
                            //console.log(idofinvoice);
                            var data = {
                                'invoice_id':idofinvoice,
                                'designation':$('.designation').val(),
                                'uml':$('.uml').val(),
                                'qte':$('.qte').val(),
                                'p_u':$('.p_u').val(),
                                'p_t':$('.p_t').val(),
                            }
                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });
                            $.ajax({
                                type:"POST",
                                url:"/invoice/store/product",
                                data:data,
                                dataType:"json",
                                success:function (response){
                                    //console.log(response);
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
                                        $('#myModal').modal('hide');
                                        $('#myModal2').modal('show');
                                        $("#uml").val("");
                                        $("#qte").val("");
                                        $("#p_u").val("");
                                        $("#p_t").val("");
                                        fetchinvprod();
                                            }
                                        }
                                    })
                                })
                              })
                            function findTotal() {
                                        var p_t = 0;
                                        var qte = document.getElementById("qte").value;
                                        var p_u = document.getElementById("p_u").value;
                                        var p_t = qte * p_u;
                                        document.getElementById("p_t").value = p_t;
                                                }