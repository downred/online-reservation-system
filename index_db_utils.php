<?php

class IndexDBUtils extends dbConnect
{
    public function getHotelImages()
    {
        $query = "SELECT * FROM ballina_image";

        $stmt = $this->connectDB()->prepare($query);

        if (!$stmt->execute()) {
            $stmt = null;
            header("location: ./index.php?error=stmtfailed");
            exit();
        }

        $result = $stmt->fetchAll();

        return $result;
    }

    public function getFeedback()
    {
        $query = "SELECT * FROM feedback";

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