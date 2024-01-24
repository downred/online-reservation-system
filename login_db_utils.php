<?php

class LoginDBUtils extends dbConnect
{

    public function getUser($email, $password)
    {
        $query = "SELECT password, is_admin FROM perdoruesi WHERE email = ?";
        $stmt = $this->connectDB()->prepare($query);

        if (!$stmt->execute(array($email))) {
            $stmt = null;
            header("location: login.php?error=stmtfailed");
            exit();
        }

        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: login.php?error=usernotfound");
            $_SESSION["error_msg"] = "Kjo llogari nuk ekziston";
            exit();
        }

        $fetchedData = $stmt->fetchAll();
        $hashedPwd = $fetchedData[0]["password"];
        $checkPwd = password_verify($password, $hashedPwd);

        session_start();

        if (!$checkPwd) {
            $stmt = null;
            header("location: login.php?error=wrongpassword");
            $_SESSION["error_msg"] = "Fjalekalimi i dhene eshte i pasakte.";
            exit();
        } else if ($checkPwd) {
            $userQuery = "SELECT * FROM perdoruesi WHERE email = ? AND password = ?";
            $stmt = $this->connectDB()->prepare($userQuery);

            if (!$stmt->execute(array($email, $hashedPwd))) {
                $stmt = null;
                header("location: login.php?error=stmtfailed");
                exit();
            }


            $user = $stmt->fetchAll();

            if ($stmt->rowCount() == 0) {
                $stmt = null;
                header("location: login.php?error=usernotfound");
                $_SESSION["error_msg"] = "Kjo llogari nuk ekziston";
                exit();
            }



            $_SESSION["userid"] = $user[0]["perdoruesi_id"];
            $_SESSION["is_admin"] = $user[0]["is_admin"];

            if ($_SESSION["is_admin"] == 1) {
                header("location: ./dashboard/dboard-rezervimet.php");
            } else {
                header("location: index.php?loginsuccess=true");
            }


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