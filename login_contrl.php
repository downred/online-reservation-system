<?php 

class LoginContr extends LoginDBUtils
{
    private $email;
    private $password;
    public function __construct($email, $password)
    {
        $this->email = $email;
        $this->password = $password;
    }

    public function initLogin() {
        session_start();
        $_SESSION["form_data"] = $_POST;

        if ($this->fieldIsEmpty()) {
            header("location: login.php?error=fieldempty");
            $_SESSION["error_msg"] = "Ju lutem shenoni te gjitha te dhenat.";
            exit();
        }

        $this->getUser($this->email, $this->password);
    }

    public function fieldIsEmpty() {
        return empty($this->emri) || empty($this->email) || empty($this->password) || empty( $this->password_confirm);
    }
}