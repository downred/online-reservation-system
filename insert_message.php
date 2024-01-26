<?php

class insertMessage extends dbConnect{
    public function addMessage($name, $lastname, $email, $message)
    {
        $query = "INSERT INTO mesazhi (emri, mbiemri, email, mesazhi) VALUES (?,?,?,?);";
        $stmt = $this->connectDB()->prepare($query);

        if (!$stmt->execute(array($name, $lastname, $email, $message))) {
            $stmt = null;
            header("location: kontakt.php?error=stmtfailed");
            exit();
        }

        header("location: kontakt.php?sendingSuccessful=true");

        $stmt = null;
    }
}