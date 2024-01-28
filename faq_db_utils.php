<?php

class FaqDbUtils extends dbConnect
{
    public function getFAQ()
    {
        $query = "SELECT * FROM faq";

        $stmt = $this->connectDB()->prepare($query);

        if (!$stmt->execute()) {
            $stmt = null;
            header("location: ./index.php?error=stmtfailed");
            exit();
        }

        $result = $stmt->fetchAll();

        return $result;
    }
}