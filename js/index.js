$('.toggle').on('click', function() {
	$('.container').stop().addClass('active');
});

$('.close').on('click', function() {
	$('.container').stop().removeClass('active');
});

$("#btn-login").click(function() {
	console.log('Click!');
	$.ajax({
		type: 'POST',
		url: '../php/login.php',
		data: $('#form-login').seralize(),
		dataType: 'json',
		success: function(data) {    
			if (data.error == true) {
				$('#login-error').html(data.msg);
				$('#login-error').css('visibility', 'show');
			} else {
				window.location.href = '../home.php';
			}
		},
		beforeSend: function() {
			$('#btn-login').html('Loading...');
		},
		complete: function() {
			$('#btn-login').html('GO');
		}
	});
	return false;
});
