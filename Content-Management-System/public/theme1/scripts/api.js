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

function addComment(formID){
    var postID = $(formID).data('id'),
        data = $(formID).serialize() + '&post_ID='+postID;
    $.post(api_url + '/add-comment', data, function(response){
        if(response.error){
            $('#comment-msg').removeClass().addClass('alert alert-danger').html(response.error).show();
        }else if (response.success) {
            $('#comment-msg').removeClass().addClass('alert alert-success').html(response.success).show();
            $(formID + ' input, ' + formID + ' textarea').val('');
        } else {
            $('#no-comments').remove();
            $(formID + ' input, ' + formID + ' textarea').val('');
            $('#comment-msg').hide().removeClass().html(''); 
            $('#comments').append(response.comment);
        }
    }, 'json');
}