<?php

class HoteliDbUtils extends dbConnect
{
    public function getHotelet()
    {
        $query = "SELECT * FROM hoteli";

        $stmt = $this->connectDB()->prepare($query);

        if (!$stmt->execute()) {
            $stmt = null;
            header("location: ./rezervo.php?error=stmtfailed");
            exit();
        }

        $result = $stmt->fetchAll();

        return $result;
    }
}