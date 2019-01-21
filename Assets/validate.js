// validation jquery
$(document).ready(function(){
	$('#usercheck').hide();
	$('#passcheck').hide();
	$('#conpasscheck').hide();

	var user_err = true;
	var pass_err = true;
	var conpass_err = true;

	$('#usernames').keyup(function(){
		username_check();
	});

	function username_check(){
		var user_val = $('#usernames').val();
		//alert(user_val);
		if(user_val.length == ''){
			$('#usercheck').show();
			$('#usercheck').html("Please enter your name");
			$('#usercheck').focus();
			$('#usercheck').css("color","red");
			$('#usernames').css({"color":"red" ,"border": "1px solid red"});
			user_err = false;
			return false;
		}
		else{
			$('#usercheck').hide();
		}
		if((user_val.length < 3 ) || (user_val.length > 10 )){
			$('#usercheck').show();
			$('#usercheck').html("Please enter your valid name");
			$('#usercheck').focus();
			$('#usercheck').css("color","red");
			user_err = false;
			return false;
		}
		else{
			$('#usercheck').hide();
		}
	}


	$('#password').keyup(function(){
		password_check();
	});


	function password_check(){
		var pwd_val = $('#password').val();
		if(pwd_val.length == ''){
			$('#passcheck').show();
			$('#passcheck').html("Please enter your password");
			$('#passcheck').focus();
			$('#passcheck').css("color","red");
			$('#password').css({"color":"red" ,"border": "1px solid red"});
			pass_err = false;
			return false;
		}
		else{
			$('#passcheck').hide();
		}
		if((pwd_val.length < 8 ) || (pwd_val.length > 20 )){
			$('#passcheck').show();
			$('#passcheck').html("password must be of atleast 8 charachter");
			$('#passcheck').focus();
			$('#passcheck').css("color","red");
			pass_err = false;
			return false;
		}
		else{
			$('#passcheck').hide();
		}
	}

	$('#conpassword').keyup(function(){
		Cpassword_check();
	});


	function Cpassword_check(){
		var pwd_val = $('#password').val();
		var Cpwd_val = $('#conpassword').val();
		if( pwd_val != Cpwd_val){
			$('#conpasscheck').show();
			$('#conpasscheck').html("password does not match");
			$('#conpasscheck').focus();
			$('#conpasscheck').css("color","red");
			$('#conpassword').css({"color":"red" ,"border": "1px solid red"});
			conpass_err = false;
			return false;
		}
		else{
			$('#conpasscheck').hide();
		}
		if(Cpwd_val.length == ''){
			$('#conpasscheck').show();
			$('#conpasscheck').html("Please enter your Confirm password");
			$('#conpasscheck').focus();
			$('#conpasscheck').css("color","red");
			$('#conpassword').css({"color":"red" ,"border": "1px solid red"});
			conpass_err = false;
			return false;
		}		
	}

	$('#submitbtn').click(function(){
		user_err = true;
		pass_err = true;
		conpass_err = true;

		username_check();
		password_check();
		Cpassword_check();

		if((user_err == true) && (pass_err == true) && (conpass_err == true)){
			return true;
		}
		else{
			return false;
		}
	});
		
});