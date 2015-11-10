 var dateArray = [];
 var community = [$(".container-fluid[data-type=com]").attr("data-id")];
 var token =  $('input[name=_token]').val();
 console.log(token);
$.ajax({ // fonction jQuery pour la requete ajax en utilisant la methode HTTP POST
      type: 'POST',
      url: '/mealoclock/public/eventsAjaxCom',
      headers: {'XSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      data: {'com': community, '_token': token},
      success: function(data){
        console.log('c\'est OK');
        dateArray = data;
      },
      error: function(data){
        var errors = data.responseJSON;
        console.log(errors);
      }
    });

    //console.log(data);
    var dmy='';
    function available(date){

      dmy = date.getFullYear() + "-" + ( '0' + (date.getMonth()+1) ).slice( -2 ) + "-" + ( '0' + (date.getDate()) ).slice( -2 );
      console.log(dmy);
      if ($.inArray(dmy, dateArray) !== -1) {
        return [true, "","Available"];
      } else {
        return [false,"","unAvailable"];
      }
    }

    $('#datepicker').datepicker({
      beforeShowDay: available,
      onSelect: function(date){
        var arr = date.split('/');
        var selectDate = arr[2] + "-" + arr[1] + "-" + arr[0];
        //console.log(selectDate);
        $('#event_list li').each(function() {                    // loop through the list
          var liId = $(this).attr('id'); // get value of the id attribute of the  <li>
          if(liId == selectDate) {      // search if textboxVal is in listVal
              $(this).show();                         // if true show this <li>
          } else {
              $(this).hide();                         // else hide this <li>
          }
        });
      }
    });

    $('#resetDate').on('click', function(){
        $.datepicker._clearDate('#datepicker');
        $('#event_list li').each(function() {
          $(this).show();
        });

    });
