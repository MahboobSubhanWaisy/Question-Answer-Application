$(document).ready(function() {

    let NameError = true;
    $('#your-name-inp').keyup(function () {
        yourName();
    });

    function yourName() {
        let data = $('#your-name-inp').val();
        if (data == '') {
            $('#your-name').show();
            $('#your-name-inp').css('border-color', 'red');
            NameError = false;
            return false;
        } else if ((data.length < 3)) {
            $('#your-name').show();
            $('#your-name-inp').css('border-color', 'red');
            $('#your-name').html('Name Must Be Greter Than 3 Characters.');
            NameError = false;
            return false;
        } else {
            $('#your-name').hide();
            $('#your-name-inp').css('border-color', '#2d86eb');
            NameError = true;
        }
    }



    let phoneError = true;
    $('#phone').keyup(function () {
        phone();
    });

    function phone() {
        let phone = $('#phone').val();
        if (phone == '') {
            $('#phone-error').show();
            $('#phone').css('border-color', 'red');
            phoneError = false;
            return false;
        } else if ((phone.length <= 9) || (phone.length >= 16)) {
            $('#phone-error').show();
            $('#phone').css('border-color', 'red');
            $('#phone-error').html('Phone Number Between 10 To 15 Digits.');
            phoneError = false;
            return false;
        } else {
            $('#phone-error').hide();
            $('#phone').css('border-color', '#2d86eb');
            phoneError = true;
        }
    } 


    let emailError = true;
    $('#email').keyup(function(){
        email();
    });
    function email(){
        let emailValue = $('#email').val();
        var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if(emailValue == ''){
            $('#emailcheck').show();
            $('#email').css('border-color', 'red');
            emailError = false;
            return false;
        }else if((emailValue.length < 10) || (emailValue.length > 30)){
            $('#emailcheck').show();
            $('#email').css('border-color', 'red');
            $('#emailcheck').html('Email Between 10 And 30 Characters');
            emailError = false;
            return false;
        }else if(!regex.test(emailValue)){
            $('#emailcheck').show();
            $('#email').css('border-color', 'red');
            $('#emailcheck').html('Invalid E-mail Address');
            emailError = false;
            return false;
        }else if($.isNumeric(emailValue)){
            $('#emailcheck').show();
            $('#email').css('border-color', 'red');
            $('#emailcheck').html('Only characters are allowed.!');
            emailError = false;
            return false;
        }else{
            $('#emailcheck').hide();
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
            $('#passCheck').show();
            $('#password').css('border-color', 'red');
            passError = false;
            return false;
        }else if((newPassValue.length < 8)){
            $('#passCheck').show();
            $('#password').css('border-color', 'red');
            $('#passCheck').html('At least 8 characters');
            passError = false;
            return false;
        }else if($.isNumeric(newPassValue)){
            $('#passCheck').show();
            $('#password').css('border-color', 'red');
            $('#passCheck').html('Only characters are allowed.!');
            passError = false;
            return false;
        }else{
            $('#passCheck').hide();
            $('#password').css('border-color', '#2d86eb');
            passError = true;
        }
    }


    $('#re-submit').click(function(){
        yourName();
        phone();
        email();
        password();
        if ((NameError == true) && (phoneError == true) && (emailError == true) && (passError == true)) {
            return true;
        }else{
            return false;
        }
    });

});
