$(function(){
    $('#province').on('change', function() {
        var plateNo = $(this).val();
        if(plateNo){
            $.post('ajax.php',{'plateNo': plateNo}, function(response){
                $('#district').html(response).removeAttr('disabled');
            });   
        }
        else {
            $('#district').html('<option value=""> - Chose a District - </option>').attr('disabled','disabled');
        }
    })
});