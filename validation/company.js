$(document).ready(function () {
    var reg_name = /^[a-zA-Z\s]*$/; 

    let NameError = true;
    $('#company-name').keyup(function () {
        Name();
    });

    function Name() {
        let data = $('#company-name').val();
        if (data == '') {
            $('#company-name-error').show();
            NameError = false;
            return false;
        } else if ((data.length < 2)) {
            $('#company-name-error').show();
            $('#company-name-error').html('Company Name Must Be Greter Than 2 Characters.!');
            NameError = false;
            return false;
        } else if($.isNumeric(data)){
            $('#company-name-error').show();
            $('#company-name-error').html('Only alphabets are allowed.!');
            NameError = false;
            return false;
        } else if(!reg_name.test(data)){
            $('#company-name-error').show();
            $('#company-name-error').html('Only alphabets are allowed.!');
            NameError = false;
            return false;
        } else {
            $('#company-name-error').hide();
            NameError = true;
        }
    }


    let FoundedError = true;
    $('#founded').keyup(function () {
        founded();
    });

    function founded() {
        let data = $('#founded').val();
        if (data == '') {
            $('#founded-error').show();
            FoundedError = false;
            return false;
        } else {
            $('#founded-error').hide();
            FoundedError = true;
        }
    }


    let DescriptionError = true;
    $('#des').keyup(function () {
        Des();
    });

    function Des() {
        let data = $('#des').val();
        if (data == '') {
            $('#des-error').show();
            DescriptionError = false;
            return false;
        } else if ((data.length < 2)) {
            $('#des-error').show();
            $('#des-error').html('Description Must Be Greter Than 2 Characters.!');
            DescriptionError = false;
            return false;
        } else if($.isNumeric(data)){
            $('#des-error').show();
            $('#des-error').html('Only alphabets are allowed.!');
            DescriptionError = false;
            return false;
        } else {
            $('#des-error').hide();
            DescriptionError = true;
        }
    }


    let genderError = true;
    $('#status').change(function () {
        status();
    });

    function status() {
        let gender = $('#status').val();
        if (gender == '') {
            $('#status-error').show();
            genderError = false;
            return false;
        } else {
            $('#status-error').hide();
            genderError = true;
        }
    }


    let LocationError = true;
    $('#location').keyup(function () {
        location();
    });

    function location() {
        let data = $('#location').val();
        if (data == '') {
            $('#location-error').show();
            LocationError = false;
            return false;
        } else {
            $('#location-error').hide();
            LocationError = true;
        }
    }


    let WebsiteError = true;
    $('#website').keyup(function () {
        website();
    });

    function website() {
        let data = $('#website').val();
        if (data == '') {
            $('#website-error').show();
            WebsiteError = false;
            return false;
        } else {
            $('#website-error').hide();
            WebsiteError = true;
        }
    }


    $('#add-company').click(function(){
        Name();
        founded();
        Des();
        status();
        website();
        location();

        if((NameError == true) && (FoundedError == true) && (DescriptionError == true) && (genderError == true) && (WebsiteError == true) && (LocationError == true)){
            return true;
        }else{
            return false;
        }
    });
});