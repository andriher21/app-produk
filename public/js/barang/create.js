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
function save(){
    var urls = null;
    var img = $('#imgview').attr('src')
    var name = $('#name').val();
    var kategori = $('#kategori').val();
    var hargabeli = $('#hargabeli').val();
    var hargajual = $('#hargajual').val();
    var stok = $('#stok').val();
    if(img != null){
        var urls = img.split("/").pop();
    }
    $.ajax({
        url: base_url+"/produk/createsave",
        type: "POST",
        dataType: 'json',
        data: {
            foto:urls,
            name:name,
            kategori:kategori,
            hargabeli:hargabeli,
            hargajual:hargajual,
            stok:stok,
        },
        async:false,
        success: function(response) {
            // console.log(data);
            if(response.error){
                    let data = response.error;
                    if(data.errorname ){
                        $('#name').addClass('is-invalid');
                        $('.errorname').html(data.errorname);
                    }
                    else{
                        $('#name').removeClass('is-invalid');
                        $('#name').addClass('is-valid');
                    }
                    if(data.errorkategori ){
                        $('#kategori').addClass('is-invalid');
                        $('.errorkategori').html(data.errorkategori);
                    }
                    else{
                        $('#kategori').removeClass('is-invalid');
                        $('#kategori').addClass('is-valid');
                    }
                    if(data.errorhargabeli ){
                        $('#hargabeli').addClass('is-invalid');
                        $('.errorhargabeli').html(data.errorhargabeli);
                    }
                    else{
                        $('#hargabeli').removeClass('is-invalid');
                        $('#hargabeli').addClass('is-valid');
                    }
                    if(data.errorhargajual ){
                        $('#hargajual').addClass('is-invalid');
                        $('.errorhargajual').html(data.errorhargajual);
                    }
                    else{
                        $('#hargajual').removeClass('is-invalid');
                        $('#hargajual').addClass('is-valid');
                    }
                    if(data.errorstok ){
                        $('#stok').addClass('is-invalid');
                        $('.errorstok').html(data.errorstok);
                    }
                    else{
                        $('#stok').removeClass('is-invalid');
                        $('#stok').addClass('is-valid');
                    }
            }
            else if(response.sukses){
                location.replace(base_url+'/produk');
            }
        }
    }); 
    
}