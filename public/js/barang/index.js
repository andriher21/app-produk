
$('.produk').ready(function() {

    var table = $('#dataTable').dataTable({
        "bLengthChange" : false,
        "pageLength": 10,
         "columnDefs": [
        { 
            "targets": [ -7 ],
            "orderable": false,
            "ordering": false
        }
        ],
        
        "order": [[1, 'asc']],
        buttons: [
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: [1,2,3,4,5]
                }
            }
        ]
    });
    $('#searchbox').keyup(function() {
        table.fnFilter($(this).val());
        });
    $('.kategori-filter').change(function(){
         table.fnFilter($(this).val(), -5);
        id = $('#kategori_filter').val();
         if (id == ''){
             id = 'undefined';
         }
      // console.log(id);
     });
    $(".btn-export").click(() => { 
        $('#dataTable').DataTable().buttons(0,0).trigger()
    });

     var all = table.fnGetNodes();

    });

function deleted(ids,nama){

    var nameToDelete = '<b>Are you sure to delete this data?</b><ol class="m-t-8 p-l-20">';
    nameToDelete += '<li>'+nama+'</li>';
    nameToDelete += '</ol>';
    confirmation(nameToDelete, 'doDelete("'+ids+'")');

}

function doDelete(id){
  
    $.ajax({
        url: base_url+"/produk/delete",
        type: 'post',
        dataType: 'json',
        data: {id: id},
        async:false,
        success: function(data){
            // console.log(data);
            location.reload(true);
        }
    });
    
}



