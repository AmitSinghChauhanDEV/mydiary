$(document).ready(function(){
    
    $('.log_link').click(function(){
        $('#login_f').show();
        $('#signup_f').hide();

    })
    $('.signup_link').click(function(){
        $('#signup_f').show();
        $('#login_f').hide();

    })



    $('#text').keypress(function(e){ 
        var myValue = $(this).val();
        
        $.ajax({
           url:'updatedy.php',
           type: 'POST',
           data:{ content:myValue}
        });
     });
    
});
