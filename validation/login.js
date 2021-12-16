$(document).ready(function() {

    let emailError = true;
    $('#email').keyup(function(){
        email();
    });
    function email(){
        let emailValue = $('#email').val();
        var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if(emailValue == ''){
            $('#email-error').show();
            $('#email').css('border-color', 'red');
            emailError = false;
            return false;
        }else if((emailValue.length < 10) || (emailValue.length > 30)){
            $('#email-error').show();
            $('#email').css('border-color', 'red');
            $('#email-error').html('Email Between 10 And 30 Characters');
            emailError = false;
            return false;
        }else if(!regex.test(emailValue)){
            $('#email-error').show();
            $('#email').css('border-color', 'red');
            $('#email-error').html('Invalid E-mail Address');
            emailError = false;
            return false;
        }else if($.isNumeric(emailValue)){
            $('#email-error').show();
            $('#email').css('border-color', 'red');
            $('#email-error').html('Only characters are allowed.!');
            emailError = false;
            return false;
        }else{
            $('#email-error').hide();
            $('#email').css('border-color', '#2d86eb');
            emailError = true;
        }
    }

    let passError = true;
    $('#password').keyup(function(){
        password();
    });

    function password(){
        let newPassValue = $('#password').val();
        if(newPassValue == ''){
            $('#password-error').show();
            $('#password').css('border-color', 'red');
            passError = false;
            return false;
        }else if((newPassValue.length < 8)){
            $('#password-error').show();
            $('#password').css('border-color', 'red');
            $('#password-error').html('At least 8 characters');
            passError = false;
            return false;
        }else if($.isNumeric(newPassValue)){
            $('#password-error').show();
            $('#password').css('border-color', 'red');
            $('#password-error').html('Only characters are allowed.!');
            passError = false;
            return false;
        }else{
            $('#password-error').hide();
            $('#password').css('border-color', '#2d86eb');
            passError = true;
        }
    }

    $('#login-submit').click(function(){
        email();
        password();
        if ((emailError == true) && (passError == true)) {
            return true;
        }else{
            return false;
        }
    });
    
});