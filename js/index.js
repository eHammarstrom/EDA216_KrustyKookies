$('.toggle').on('click', function() {
	$('.container').stop().addClass('active');
});

$('.close').on('click', function() {
	$('.container').stop().removeClass('active');
});

$('#btn-login').click(function() {
	console.log('clicked login button');
	$.ajax({
		type: 'POST',
		url: '../php/login.php',
		data: $('#form-logir').serialize(),
		dataType: 'json',
		success: function(data) {    
			if (data.error == true) {
				console.log('Invalid credentials.');
				$('#login-error').html(data.msg);
				//$('#login-error').css('visibility', 'visible');
				$('#login-error').fadeIn('slow');
			} else {
				console.log('Correct credentials.');
				//window.location.href = '../home.php';
			}
		},
		beforeSend: function() {
			$('#btn-login').html('Loading...');
		},
		complete: function() {
			console.log('ajax call completed');
			$('#btn-login').html('GO');
		},
		error: function(exception) {
			console.log(exception);
		}
	});
	return false;
});

$('#btn-register').click(function() {
	console.log('clicked login button');
	$.ajax({
		type: 'POST',
		url: '../php/register.php',
		data: $('#form-register').serialize(),
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
			$('#btn-register').html('Loading...');
		},
		complete: function() {
			$('#btn-register').html('GO');
		}
	});
	return false;
});
