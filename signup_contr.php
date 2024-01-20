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
        if ($this->fieldIsEmpty()) {
            header("location: signup.php?error=fieldempty");
            exit();
        }
        // if (!$this->emriIsValid()) {
        //     header("location: signup.php?error=nameinvalid");
        //     exit();
        // }
        if (!$this->emailIsValid()) {
            header("location: signup.php?error=emailinvalid");
            exit();
        }
        if (!$this->passwordIsValid()) {
            header("location: signup.php?error=passwordinvalid");
            exit();
        }
        if (!$this->pwMatch()) {
            header("location: signup.php?error=passwordsnotmatching");
            exit();
        }
        // if (!$this->userAlreadyExists()) {
        //     header("location: signup.php?error=emailtaken");
        //     exit();
        // }

        $this->addUser($this->emri, $this->mbiemri, $this->email, $this->password);
    }

    public function fieldIsEmpty() {
        return empty($this->emri) || empty($this->email) || empty($this->password) || empty( $this->password_confirm);
    }

    private function emriIsValid()
    {
        if (!preg_match("/\d/", $this->emri)) {
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