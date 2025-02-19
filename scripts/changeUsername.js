$(document).ready(function(){
    $('#changeUsernameForm').on('submit', function(e){
        e.preventDefault();

        $.ajax({
            url: 'update_user.php', //PHP script to handle the update
            type: 'POST',
            data: $(this).serialize(), // Send form data
            dataType: 'json', // Expect JSON response
            success: function(response) {
                // Display the message inside the 'responseMessage' div
                $('#responseMessage').html(response.message).css('color', response.status === 'success' ? 'green' : 'red');
            },
            error: function(xhr, status, error) {
                $('#responseMessage').html('An error occurred: ' + error).css('color', 'red');
            }
        });
    });
});
