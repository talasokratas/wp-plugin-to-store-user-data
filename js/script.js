(function($) {
    $(document).ready(function($) {
        $("#evaldas-form").submit(function(){
          event.preventDefault();

          var name = $('#name').val();
          var lastname = $('#lastname').val();
          var birthdate = $('#birthdate').val();
          var address = $('#address').val();

          $.ajax({

              type : "POST",
              url: evaldasAjax.ajaxurl,
              data: {
                  'action' : 'post_person_data',
                  'name' : name,
                  'lastname' : lastname,
                  'birthdate' : birthdate,
                  'address' : address
              },
              success : function(data){
                  alert('Form Submited')
              }

          })


        });
    });
})(jQuery);