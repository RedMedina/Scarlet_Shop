<div class="container-porfile">
        <div class="profile">
            <img id="profile-image" src=<?php echo $_SESSION['photo'];?> alt="Foto de perfil">
            <input id="upload-input" class="file-upload" type="file" accept="image/*">
            <h2><?php echo $_SESSION['fullname'];?></h2>
        </div>

        <h3>Datos Personales</h3>
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" value=<?php echo $_SESSION['fullname'];?>>
        </div>

        <div class="form-group">
            <label for="correo">Correo Electrónico:</label>
            <input type="email" id="correo" value=<?php echo $_SESSION['mail'];?>>
        </div>

        <div class="form-group">
            <button class="open-modal-btn">Cambiar contraseña</button>
        </div>

        <div class="modal-overlay" id='modal-pass'>
         <div class="modal-content">
            <h3>Cambiar Contraseña</h3>
            <!----form-------->
                <div class="form-group">
                    <label for="contrasena-actual">Contraseña Actual:</label>
                    <input type="password" id="contrasena-actual" >
                </div>

                <div class="form-group">
                    <label for="nueva-contrasena">Nueva Contraseña:</label>
                    <input type="password" id="nueva-contrasena" >
                </div>

                <div class="form-group">
                    <label for="confirmar-contrasena">Confirmar Contraseña:</label>
                    <input type="password" id="confirmar-contrasena" >
                </div>

                <div class="form-group">
                    <input type="submit" value="Cambiar contraseña" id='Update_password'>
                </div>
         </div>
        </div>

            <div class="form-group">
                <input type="submit" value="Guardar Cambios" id='Update_user'>
            </div>
        <!----/form--->
    </div>