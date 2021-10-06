$(document).ready(function(){
    
    $('.log_link').click(function(){
        $('#login_f').show();
        $('#signup_f').hide();

    })
    $('.signup_link').click(function(){
        $('#signup_f').show();
        $('#login_f').hide();

    })

    // $("#text").on("change paste keyup", function() {
    //     $.ajax({
    //        method: "POST",
    //        url: "updatedy.php",
    //        data: { content: $("#text").val() }
    //      });

    // });

    $('#text').keypress(function(e){ 
        var myValue = $(this).val();
        
        $.ajax({
           url:'updatedy.php',
           type: 'POST',
           data:{ content:myValue}
        });
     });
    
});