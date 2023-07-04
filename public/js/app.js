$(document).ready
(
	function($){$("#Create_User").click(function(){ SignUp(); })}
);

function SignUp()
{
    var fullname = $('#name').val();
    var email = $('#email').val();
    var password = $('#password').val();
    var dataToSend = { active: true, fullname: fullname , email: email, key: password};
    var Json = JSON.stringify(dataToSend);
    $.ajax({
        url: 'includes/user-reg.include.php',
        type: 'POST',
        async: true,
        data: {'register':Json},
        success: function(response)
        {
            console.log(response);
        }
    });
}