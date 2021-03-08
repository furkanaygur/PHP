function contact(formID){
    var data = $(formID).serialize();
    $.post(api_url + '/contact',data, function(response){
        if(response.error){
            $('#contact-success-msg').hide();
            $('#contact-error-msg').show().html(response.error);
        } else {
            $('#contact-error-msg').hide();
            $('#contact-success-msg').show().html(response.success);
            $(formID + 'input, ' + formID + ' textarea').val('');
        }
    }, 'json');
}