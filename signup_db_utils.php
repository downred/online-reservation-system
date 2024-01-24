<?php

class SignupDBUtils extends dbConnect
{
    public function addUser($emri, $mbiemri, $email, $password)
    {
        $query = "INSERT INTO perdoruesi (emri, mbiemri, email, password, is_admin) VALUES (?,?,?,?, false);";
        $stmt = $this->connectDB()->prepare($query);
        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
        
        if (!$stmt->execute(array($emri, $mbiemri, $email, $hashedPwd))) {
            $stmt = null;
            header("location: signup.php?error=stmtfailed");
            exit();
        }

        header("location: login.php?signupsuccess=true");

        $stmt = null;
    }
    public function checkUser($email)
    {
        $query = "SELECT * FROM perdoruesi WHERE email = ?";
        $stmt = $this->connectDB()->prepare($query);

        if (!$stmt->execute(array($email))) {
            $stmt = null;
            header("location: signup.php?error=stmtfailed");
            exit();
        }

        if ($stmt->rowCount() > 0) {
            return true;
        }
        return false;
    }
}