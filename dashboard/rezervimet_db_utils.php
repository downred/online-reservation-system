<?php
class RezervimetDBUtils extends dbConnect
{
    public function getRezervimet()
    {
        $query = "SELECT CONCAT(perdoruesi.emri, ' ', perdoruesi.mbiemri) as 'Emri i klientit', hoteli.emri,     rezervimi.date_from, rezervimi.date_to,
        hoteli.cmimi_per_nate,
        DATEDIFF(rezervimi.date_to, rezervimi.date_from) * hoteli.cmimi_per_nate AS 'Totali i pageses'
                  FROM perdoruesi
                  JOIN rezervimi ON perdoruesi.perdoruesi_id = rezervimi.perdoruesi_id
                  JOIN hoteli ON rezervimi.hoteli_id = hoteli.hoteli_id;";

        $stmt = $this->connectDB()->prepare($query);

        if (!$stmt->execute()) {
            $stmt = null;
            header("location: ./dboard-rezervimet.php?error=stmtfailed");
            exit();
        }

        $result = $stmt->fetchAll();

        return $result;
    }
}