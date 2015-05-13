function submit_form() { 
    $("#my_form").ajaxSubmit({
        type: 'post',
        success: function(response) {
            var json = JSON.parse(response);
            if (json.success) {
                //log in page
                if (json.authenticate) {
                   window.location = '.';
                }

                if(json.create){

                }   

            }else {
                alert(system_message(json,0));
                //system_message(json, 0);
            }
        }
    });
}

function system_message(json, success) {
    var message = '';
    if (success != 1) {
        for (i = 0; i < json.length; i++) {
            message += json[i] + "\n";
        }
    } else {
        message = json.message;
    }
    return  message;
}

$('document').ready(function(e){

$('#btn_login').click(function() {
        submit_form();
    });
$('#btn_save').click(function() {
        submit_form();
    });

$('.login_form input').keypress(function(e) {
        if (e.which == 13) {
            submit_form();
        }
    });

});