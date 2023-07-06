<div class="container-signup">
        <h1>Sign Up</h1>
         <input type="text" name="name" id="name" placeholder="fullname..." required>
         <input type="email" name="email" id="email" placeholder="email..." required>
         <input type="file" name="photo" id="photo" accept="image/*" required>
         <input type="password" name="password" id="password" placeholder="password..." required>
         <input type="password" name="confirm_password" id="Cpassword" placeholder="Confirm password..." required>
         <button type="submit" id='Create_User'>Sign Up</button>
         <p class="login-link">Do you already have an account? <a href=<?php Redirect("/Login"); ?>>Log in Here!</a></p>
</div>