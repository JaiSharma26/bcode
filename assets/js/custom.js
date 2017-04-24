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

	/*** edit user ***/

	$('.edit-user').on('click',function() {


		 var userId = $(this).data('userid');
		 $.ajax({

		 	type:'POST',
		 	url: URL+'admin/user/edit',
		 	data: {userId : userId },
		 	success:function(data) {
		 		//alert(data);
		 		$('#myModal .modal-body').html(data);
		 		$('#myModal').modal('show');
		 	}

		 });

	});

	/*** (end)edit user ***/	
	/**** delete user ****/

	$('.delete-user').on('click',function() {
		var userId = $(this).data('userid');
		bootbox.confirm("Do you want to delete this record", function(result){
			 //console.log('This was logged in the callback: ' + result);

			 if(result == true) {

			 	$.ajax({

			 		type:"POST",
			 		url:URL+'admin/user/delete',
			 		data:{userId : userId},
			 		success:function(data) {
			 			//after delete result
			 		}

			 	});

			 }

		});
	});

	/**** (end)delete user ****/
	$('.user-switch').on('change',function() {
			var userId = $(this).data('userid');
			var checked = 'N';
			if($(this).is(':checked')) {
				//alert('checked');
				checked = 'Y';
			} else {
				checked = 'N';
			}
			$.ajax({
			 		type:"POST",
			 		url:URL+'admin/user/activeuser',
			 		data:{userId : userId,checked : checked},
			 		success:function(data) {

			 				//after active action
			 		}
			});

	});

	/**** job posts ******/

	$(document).on('click','edit-job',function() {

		$.ajax({
			type:'POST',
			url:URL+''
		})

	});

	/****(end)job posts *****/

	/********* frontend ************/
	$('.user-type').click(function() {
		var user_type = $(this).attr('name');
		if(user_type === 'freelancer') {
				var user_frm = $('.freelancer-frm').html();
				$('#blocks').html(user_frm);
		} else if(user_type === 'customer') {
				var user_frm = $('.customer-frm').html();	
				$('#blocks').html(user_frm);
		}

	}); //end .user-type

	
	$(document).on('click','.profile-submit',function(e) {
		e.preventDefault();
		var record = $(this).parents('form').serialize();
		//alert('working');
		$.ajax({
				type:'POST',
				url:URL+'me/profile',
				data:record,
				success:function(data){
					//alert(data);
					console.log(data);	
					$('.error-msg').html('');
					var Obj = $.parseJSON(data);
					if(Obj.success == 0) {

						$.each(Obj.message, function(key,val){
							$('.error-msg').append('<p><strong>' + val + '</strong></p>');
						});
						
					} else {
						//$('.error-msg').html('Profile added successfully. You are ready for further action');
						console.log(data);
					}
				}

		});
	});

/**** post job *****/

	$('#submit_job').click(function(e){
			e.preventDefault();
			var frm_rec = $(this).parents('form').serialize();
		
			$.ajax({
				type:'POST',
				url:URL+'dashboard/submitjob',
				data:frm_rec,
				success:function(data) {
					alert(data);
					$(this).parents('form').reset();
				}
			});
	});

});
