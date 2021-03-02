$(function(){
    $('#btn').on('click', function(e){
        var formData= $('#form').serialize();
        $.post('ajax.php', formData +'&type=contact', function(response){
            if(response.err){
                $('#alert-success').hide();
                $('#alert-err').html(response.err).show();
            } else {
                $('#alert-err').hide();
                $('#alert-success').html(response.success).show();
                $('#form input, #form textarea ').val();
            }
        },'json');
        e.preventDefault();
    })
});