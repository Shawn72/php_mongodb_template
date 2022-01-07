'use-strict';

$(function(){
  $('.editlink').on('click', function(){
    var id = $(this).data('id');
    var dropdown = $('#category');
    if(id){
      $.ajax({
          method: "GET",
          url: "fetch_ajax.php",
          data: { id: id}
        })
        .done(function( result ) {
          result = $.parseJSON(result);
          $('#product_name').val(result['product_name']);
          $('#description').val(result['description']);
          $('#price').val(result['price']);
          $('#category').val(result['category']); //fill in the dropdown   
          $('#id').val(result['id']);
          $('#btn').val('Update Record');
          $('#form1').attr('action', 'edit_record.php');
        });
      }
    });
});

//you can add other JavaScript functions
