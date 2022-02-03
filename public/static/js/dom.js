
        $(function() {
        // Multiple images preview with JavaScript
        var multiImgPreview = function(input, imgPreviewPlaceholder) {
            if (input.files) {
                var filesAmount = input.files.length;
                for (i = 0; i < filesAmount; i++) {
                    var reader = new FileReader();
                    reader.onload = function(event) {
                        $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(imgPreviewPlaceholder);
                    }
                    reader.readAsDataURL(input.files[i]);
                }
            }
        };
        $('#images').on('change', function() {
            multiImgPreview(this, 'div.imgPreview');
        });
        });    

    function myFunction() {
        //alert("You pressed a key inside the input field");
        var quantite = document.getElementById("quantite[0]").value;
        var prix_u = document.getElementById("prix_u[0]").value;
        var rez = quantite * prix_u;
        document.getElementById("total[0]").value = rez;
    }


    var i = 0;
    $("#dynamic-ar").click(function () {
        ++i;
        $("#dynamicAddRemove").append('<tr><td><input type="text" name="produit_name[' + i +
            ']" id="produit_name[' + i +
            ']" placeholder="Nom du produit" class="form-control" /></td><td><input type="text" id="quantite[' + i +
            ']" name="quantite[' + i +
            ']" placeholder="Quantité" class="form-control" /></td><td><input type="text" id="prix_u[' + i +
            ']" name="prix_u[' + i +
            ']" placeholder="PrixU" class="form-control" /></td><td><input type="text" id="total[' + i +
            ']" name="total[' + i +
            ']" placeholder="Total" class="form-control" /></td><td><button type="button" class="btn btn-outline-danger remove-input-field"><i class="fas fa-trash"></i></button></td></tr>'
            );
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
    });
