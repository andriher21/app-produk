$("#alert-form").hide();
$(document).ready(function() {
   
    $("#drop-area").on('dragenter', function (e){
    e.preventDefault();
    });

    $("#drop-area").on('dragover', function (e){
    e.preventDefault();
    });

    $("#drop-area").on('drop', function (e){
    e.preventDefault();
    var image = e.originalEvent.dataTransfer.files;
    createFormData(image);
    });
});
$('.autofill').keyup( function()
{
    var harga_beli = $('#hargabeli').val();
    harga_beli = parseInt(harga_beli);
    var harga_jual = harga_beli+30/100*harga_beli;
    // console.log(30/100*harga_beli);
    $('#hargajual').val(harga_jual);
});
function createFormData(image) {
    var formImage = new FormData();
    formImage.append('userImage', image[0]);
    uploadFormData(formImage);
}

function uploadFormData(formData) {
    $('#drop').show();
    $.ajax({
        url: base_url+"/produk/image",
        type: "POST",
        data: formData,
        contentType: false,
        cache: false,
        processData: false,
        success: function(data) {
            // console.log(data);
            $("#drop-area").empty();
            $('#drop').hide();
            $('#drop-area').append(data);
        }
    });
}
function save(ids){
    var img = $('#imgview').attr('src')
    var name = $('#name').val();
    var kategori = $('#kategori').val();
    var hargabeli = $('#hargabeli').val();
    var hargajual = $('#hargajual').val();
    var stok = $('#stok').val();
    if(img == null ){
        $("#alert-form").show();
       
    }
    else if(name == null){
        $("#alert-form").show();
    }else if( kategori == null){
        $("#alert-form").show();
    }else if(hargabeli == null){
        $("#alert-form").show();
    } else if(hargajual==null){
        $("#alert-form").show();
    } else if(stok == null){
        $("#alert-form").show();
    }
    var urls = img.split("/").pop();
    // console.log(urls);
    $.ajax({
        url: base_url+"/produk/editsave",
        type: "POST",
        dataType: 'json',
        data: {
            id:ids,
            foto:urls,
            name:name,
            kategori:kategori,
            hargabeli:hargabeli,
            hargajual:hargajual,
            stok:stok,
        },
        success: function(data) {
            // console.log(data);
            location.replace(base_url+"/produk");
        }
    });
}