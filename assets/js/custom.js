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
				alert(data);
			}
		})

	});
});
