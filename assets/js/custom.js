var URL = 'http://'+document.location.host + '/bcode/index.php/';
//alert(URL);
$(document).ready(function(){
	$('#register-btn').click(function(e) {
		e.preventDefault();

		var reg_rec = $('#register-frm').serialize();

		$.ajax({
			type:'POST',
			url: URL + 'main/register',
			data:reg_rec,
			success:function(data) {
				//alert(data);
				$('.error-msg').html('');
				var Obj = $.parseJSON(data);
				console.log(Obj.success);
				if(Obj.success === 0) {

				}
				
				//if(Obj.length <=  0) {
				if(Obj.success === 1){
					$('.error-msg').html('<p><strong>You have been registered successfully. Please <a href="'+URL+'">login</a> to your account</strong></p>');
				} else {
						//console.log(Obj.message);
						//var reg_errors = $.parseJSON(Obj.message);
						//alert(Obj.name);
						
						$.each(Obj.message, function(key,val){
							//alert(val);
							$('.error-msg').append('<p><strong>' + val + '</strong></p>');
						});
						
				}
				

			}
		})

	});

	//edit-delete user

	$(document).on('click','.edit-user',function() {

		$.ajax({

			//type:'POST',
			//url:URL+''

		});

	});

});
