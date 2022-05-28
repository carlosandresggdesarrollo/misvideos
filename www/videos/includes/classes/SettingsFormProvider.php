<?php

    class SettingsFormProvider {

        public function createUserDetailsForm($firstName, $lastName, $email) {

            $firstNameInput = $this->createFirstNameInput($firstName);
            $lastNameInput = $this->createLastNameInput($lastName);
            $emailInput = $this->createEmailInput($email);
            $saveButton = $this->createSaveUserDetailsButton();

            return "<form action='settings.php' method='POST' enctype='multipart/form-data'>
                <span class='title'>User Details</span>
                $firstNameInput
                $lastNameInput
                $emailInput
                $saveButton
            </form>";

        }

        public function createPasswordForm() {

            $oldPasswordInput = $this->createPasswordInput("oldPassword", "Old Password");
            $newPassword1Input = $this->createPasswordInput("newPassword", "New Password");
            $newPassword2Input = $this->createPasswordInput("newPassword2", "Confirm New Password");

            $saveButton = $this->createSavePasswordButton();

            return "<form action='settings.php' method='POST' enctype='multipart/form-data'>
                <span class='title'>Actualizar Contraseña</span>
                $oldPasswordInput
                $newPassword1Input
                $newPassword2Input
                $saveButton
            </form>";

        }

        private function createFirstNameInput($value){
            if($value == null) $value = "";
            return "<div class='form-group'>
                        <input class='form-control' type='text' placeholder='First Name' name='Nombres' value='$value' required>
                    </div>";
        }

        private function createLastNameInput($value){
            if($value == null) $value = "";
            return "<div class='form-group'>
                        <input class='form-control' type='text' placeholder='Last Name' name='Apellidos' value='$value' required>
                    </div>";
        }

        private function createEmailInput($value){
            if($value == null) $value = "";
            return "<div class='form-group'>
                        <input class='form-control' type='email' placeholder='Email' name='Correo' value='$value' required>
                    </div>";
        }

        private function createSaveUserDetailsButton(){
            return "<button type='submit' class='btn btn-primary' name='saveDetailsButton'>Guardar</button>";
        }

        private function createSavePasswordButton(){
            return "<button type='submit' class='btn btn-primary' name='savePasswordButton'>Guardar</button>";
        }

        private function createPasswordInput($name, $placeholder){
            return "<div class='form-group'>
                        <input class='form-control' type='password' placeholder='$placeholder' name='$name' required>
                    </div>";
        }

    }

?>