$(document).ready
(
	function($){
        $("#Create_User").click(function(){ SignUp(); })
        $("#Login_btn").click(function(){ login(); })
        $("#Update_user").click(function(){ update_user(); })
        $("#Update_password").click(function(){ updatepassword(); })
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
            try {
                var JsonResponse = JSON.parse(response);
                Swal.fire({
                    background: '#232f3e',
                    timer: 1500,
                    icon: JsonResponse.correct,
                    html: '<p class="style_pop">'+JsonResponse.message+'</p>'
                })
            } catch (err) {
                console.log(response);
            }
            
        },
        error: function(xhr, status, error) {
            console.log(error);
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
            try {
                var JsonResponse = JSON.parse(response);
                Swal.fire({
                    background: '#232f3e',
                    timer: 1500,
                    icon: JsonResponse.correct,
                    html: '<p class="style_pop">'+JsonResponse.message+'</p>'
                })
            } catch (err) {
                console.log(response);
            }
            
        },
        error: function(xhr, status, error) {
            console.log(error);
        }
    });
}


function update_user()
{
    var fullname = $('#nombre').val();
    var email = $('#correo').val();
    //var password = $('#password').val();
    //var confirm_password = $('#Cpassword').val();
    var Active = $('#Update_user').val();
    var file_data = $('#upload-input').prop('files')[0]; 
    var formData = new FormData();
    formData.append('file', file_data);
    formData.append('fullname', fullname);
    formData.append('email', email);
    //formData.append('key', password);
    formData.append('active', Active);
    //formData.append('Cpassword', confirm_password);
    //var dataToSend = { active: true, fullname: fullname , email: email, key: password};
    //var Json = JSON.stringify(dataToSend);
    $.ajax({
        url: 'includes/user-update.include.php',
        type: 'POST',
        async: true,
        cache: false,
        contentType: false,
        processData: false,
        data: formData,
        success: function(response)
        {
            console.log(response);
            try {
                var JsonResponse = JSON.parse(response);
                Swal.fire({
                    background: '#232f3e',
                    timer: 1500,
                    icon: JsonResponse.correct,
                    html: '<p class="style_pop">'+JsonResponse.message+'</p>'
                })
            } catch (err) {
                console.log(response);
            }
            
        }
    });
}


function updatepassword()
{
    var password_confirm = $('#confirmar-contrasena').val();
    var password_new = $('#nueva-contrasena').val();
    var password = $('#contrasena-actual').val();
    var Active = $('#Update_password').val();
    var dataToSend = { active: true, actual_pass: password, new_pass: password_new, c_new_pass: password_confirm};
    var Json = JSON.stringify(dataToSend);
    $.ajax({
        url: 'includes/user-updatepass.include.php',
        type: 'POST',
        async: true,
        data: {'response': Json},
        success: function(response)
        {
            console.log(response);
            try {
                var JsonResponse = JSON.parse(response);
                Swal.fire({
                    background: '#232f3e',
                    timer: 1500,
                    target: 'div',
                    icon: JsonResponse.correct,
                    html: '<p class="style_pop">'+JsonResponse.message+'</p>'
                })
            } catch (err) {
                console.log(response);
            }
            
        },
        error: function(xhr, status, error) {
            console.log(error);
        }
    });
}