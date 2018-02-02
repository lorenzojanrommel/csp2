  // Nav Bar Dropdown
  $( document ).ready(function(){
  $(".button-collapse").sideNav();

  });

  // Modal
$(document).ready (function ($) {
    $(function () {

        //initialize all modals           
        $('.modal').modal();

        //now you can open modal from code
        // $('#modal1').modal('open');

        //or by click on trigger
        $('.trigger-modal').modal();

    }); // end of document ready
}); // end of jQuery name space

//logout-dropdown
$('.dropdown-button').dropdown({
      inDuration: 200,
      outDuration: 125,
      constrainWidth: true, // Does not change width of dropdown to that of the activator
      hover: true, // Activate on hover
      gutter: 0, // Spacing from edge
      belowOrigin: true, // Displays dropdown below the button
      alignment: 'left', // Displays dropdown with edge aligned to the left of button
      stopPropagation: false // Stops event propagation
    }
);

//datepicker
$('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 100, // Creates a dropdown of 15 years to control year,
    today: 'Today',
    clear: 'Clear',
    close: 'Ok',
    closeOnSelect: false // Close upon selecting a date,
	});
//select gender 
 $(document).ready(function() {
    $('select').material_select();
  });
//validate
$('#username').on('input', function(){
	var username = $('#username').val();
	 $.ajax({
	  method : 'post',
	  url: 'authenticate.php',
	  data: {
	  	register : true,
	    username : username
	  },
	  success: function(data){
	    $('#modal-body').html(data);
	    if (data == 'invalid') {
	    	$('#username_error').css('color','red');
			$('#username_error').html('username exists');
	    }else {
	    	$('#username_error').css('color','green');
			$('#username_error').html('available');
	    }
		// console.log(data);
	  }
	});
	});
function validate(){
	var pass = $('#pass').val();
	var cpass = $('#cpwd').val();
		if(pass != cpass){
			$('#output').html("Password do not Match."),
			$('#output').css("color", "red");
			$('#submit').attr('disabled','disabled')
			return false;
		}else if (pass = cpass){
			$('#output').html("Password Matched.");
			$('#output').css("color", "green");
			$('#submit').removeAttr('disabled');
		return true;
		}
	}