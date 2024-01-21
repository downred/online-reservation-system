<?php

class SignupContr extends SignupDBUtils
{
    private $emri;
    private $mbiemri;
    private $email;
    private $password;
    private $password_confirm;
    public function __construct($emri, $mbiemri, $email, $password, $password_confirm)
    {
        $this->emri = $emri;
        $this->mbiemri = $mbiemri;
        $this->email = $email;
        $this->password = $password;
        $this->password_confirm = $password_confirm;
    }

    public function initSignup() {
        session_start();
        $_SESSION["form_data"] = $_POST;

        if ($this->fieldIsEmpty()) {
            header("location: signup.php?error=fieldempty");
            $_SESSION["error_msg"] = "Ju lutem shenoni te gjitha te dhenat.";
            exit();
        }
        if (!$this->emriIsValid()) {
            header("location: signup.php?error=nameinvalid");
            $_SESSION["error_msg"] = "Emri nuk mund te permbaje numra.";
            exit();
        }
        if (!$this->emailIsValid()) {
            header("location: signup.php?error=emailinvalid");
            $_SESSION["error_msg"] = "Ju lutem shenoni nje e-mail valid.";
            exit();
        }
        if (!$this->passwordIsValid()) {
            header("location: signup.php?error=passwordinvalid");
            $_SESSION["error_msg"] = "Fjalekalimi duhet te jete me i gjate se 6 karaktere.";
            exit();
        }
        if (!$this->pwMatch()) {
            header("location: signup.php?error=passwordsnotmatching");
            $_SESSION["error_msg"] = "Fjalekalimet nuk perputhen.";
            exit();
        }
        if ($this->userAlreadyExists()) {
            header("location: signup.php?error=emailtaken");
            $_SESSION["error_msg"] = "Kjo email tashme ekziston.";
            exit();
        }

        

        $this->addUser($this->emri, $this->mbiemri, $this->email, $this->password);
    }

    public function fieldIsEmpty() {
        return empty($this->emri) || empty($this->email) || empty($this->password) || empty( $this->password_confirm);
    }

    private function emriIsValid()
    {
        if (preg_match("/\d/", $this->emri)) {
            return false;
        }
        return true;
    }

    private function emailIsValid()
    {
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }
        return true;
    }

    private function passwordIsValid()
    {
        if (strlen($this->password) < 6) {
            return false;
        }
        return true;
    }

    private function pwMatch() {
        if ($this->password !== $this->password_confirm) {
            return false;
        }
        return true;
    }

    private function userAlreadyExists() {
        return $this->checkUser($this->email);
    }
}