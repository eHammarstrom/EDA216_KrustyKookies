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
		data: $('#form-login').serialize(),
		dataType: 'json',
		success: function(data) {    
			if (data.error == true) {
				console.log('Invalid credentials.');
				$('#login-error').html(data.msg);
				$('#login-error').fadeIn('slow');
			} else {
				console.log('Correct credentials.');
				window.location.href = '../home.html';
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
	console.log('clicked register button');
	$.ajax({
		type: 'POST',
		url: '../php/register.php',
		data: $('#form-register').serialize(),
		dataType: 'json',
		success: function(data) {    
			if (data.error == true) {
				$('#register-error').html(data.msg);
				$('#register-error').fadeIn('slow');
			} else {
				alert('Account created.');
			}
		},
		beforeSend: function() {
			$('#btn-register').html('Loading...');
		},
		complete: function() {
			$('#btn-register').html('GO');
		},
		error: function(exception) {
			console.log(exception);
		}
	});
	return false;
});
