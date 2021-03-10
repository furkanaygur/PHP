function sendEmail(formID) {
    var data = $(formID).serialize();
    $.post(api_url + '/send-email',data, function(response){
        if(response.error){
            $('#success').hide();
            $('#error').show().html(response.error);
        } else {
            $('#error').hide();
            $('#success').show().html(response.success);
            $(formID + ' textarea').val('');
        }
    }, 'json');
}
