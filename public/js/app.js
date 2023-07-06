$(document).ready
(
	function($){
        $("#Create_User").click(function(){ SignUp(); })
        $("#Login_btn").click(function(){ login(); })
    }
);

function SignUp()
{
    var fullname = $('#name').val();
    var email = $('#email').val();
    var password = $('#password').val();
    var confirm_password = $('#Cpassword').val();
    var Active = $('#Create_User').val();
    var file_data = $('#photo').prop('files')[0]; 
    var formData = new FormData();
    formData.append('file', file_data);
    formData.append('fullname', fullname);
    formData.append('email', email);
    formData.append('key', password);
    formData.append('active', Active);
    formData.append('Cpassword', confirm_password);
    var dataToSend = { active: true, fullname: fullname , email: email, key: password};
    var Json = JSON.stringify(dataToSend);
    $.ajax({
        url: 'includes/user-reg.include.php',
        type: 'POST',
        async: true,
        cache: false,
        contentType: false,
        processData: false,
        data: formData,
        success: function(response)
        {
            console.log(response);
        }
    });
}

function login()
{
    var email = $('#email').val();
    var password = $('#password').val();
    var dataToSend = { active: true, email: email, key: password};
    var Json = JSON.stringify(dataToSend);
    $.ajax({
        url: 'includes/login.include.php',
        type: 'POST',
        async: true,
        data: {'response': Json},
        success: function(response)
        {
            console.log(response);
        }
    });
}