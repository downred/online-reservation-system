<?php

class LoginDBUtils extends dbConnect
{

    public function getUser($email, $password)
    {
        $query = "SELECT password FROM perdoruesi WHERE email = ?";
        $stmt = $this->connectDB()->prepare($query);

        if (!$stmt->execute(array($email, $password))) {
            $stmt = null;
            header("location: login.php?error=stmtfailed");
            exit();
        }

        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: login.php?error=usernotfound");
            exit();
        }

        $fetchedData = $stmt->fetchAll();

        $checkPwd = password_verify($password, $fetchedData[0]["password"]);

        if (!$checkPwd) {
            $stmt = null;   
            header("location: login.php?error=wrongpassword");
            exit();
        } else if ($checkPwd) {
            $userQuery = "SELECT * FROM perdoruesit WHERE email = ? AND password = ?";
            $stmt = $this->connectDB()->prepare($userQuery);

            if (!$stmt->execute(array($email, $password))) {
                $stmt = null;
                header("location: login.php?error=stmtfailed");
                exit();
            }

            if ($stmt->rowCount() == 0) {
                $stmt = null;
                header("location: login.php?error=usernotfound");
                exit();
            }

            $user = $stmt->fetchAll();

            session_start();
            $_SESSION["userid"] = $user[0]["perdoruesi_id"];

            header("location: index.php?loginsuccess=true");

            $stmt = null;

        }

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