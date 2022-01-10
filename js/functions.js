'use-strict';

$(document).ready(function(){ 

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

//register user
$('#form_register #submit_user').click(function(){  
  
    var fname = $('#name').val();  
    var lname = $('#lname').val();  
    var email = $('#email').val(); 
    var pass1 =  $('#password1').val();
    var pass2 =  $('#cpassword').val();

    var formData = $("#form_register").serialize();
  
    if(fname == '' || lname == '' || email == '' || pass1 == '' ||  pass2 == '')  
    {  
        $('#register_feedback').html('<span class="text-danger">All Fields are required</span>');       
    }  
    else if(pass2!== pass1){
      $('#register_feedback').html('<span class="text-danger">password mismatch!</span>');
      $('#cpassword').val() == '';
    }
    else  
    {  
        $.ajaxSetup({
          global: false,
          type: "POST",
          url: "functions.php",
          beforeSend: function () {
            $('#register_feedback').html('<span class="text-info">Loading response...wait</span>');  
          },
          complete: function () {
            // $('#register_feedback').hide();
            }
        });

        $.ajax({  
              url:"functions.php",  
              method:"POST",  
              data:formData,   
              success:function(data){  
                switch(data){

                  case "insert_success":
                   
                    $('form').trigger("reset");  
                    $('#register_feedback').fadeIn().html('<span class="alert alert-success">You have successfully registered!</span>');  
                    setTimeout(function(){  
                          $('#register_feedback').fadeOut("slow");  
                    }, 5000); //timeout 5 sec

                    break;
                  case "insert_failure":
                    $('form').trigger("reset");  
                    $('#register_feedback').html('<span class="alert alert-danger">Unknown error occured while submitting data!</span>');  
                    setTimeout(function(){  
                          $('#register_feedback').fadeOut("slow");  
                    }, 5000); //timeout 5 sec

                    break;
                    
                  default:
                    $('form').trigger("reset");  
                    $('#register_feedback').html('<span class="alert alert-danger">Email exists, choose another email!</span>');  
                    setTimeout(function(){  
                      $('#register_feedback').fadeOut("slow");  
                    }, 5000); //timeout 5 sec

                    break 

                  }         

            } 
        }); 
        //end ajax 
      } 

  });

  //form next

})


//you can add other JavaScript functions
