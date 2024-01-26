<?php
class DBUtils extends dbConnect
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
            header("location: ./dboard_rezervimet.php?error=stmtfailed");
            exit();
        }

        $result = $stmt->fetchAll();

        return $result;
    }

    public function getTeRejat() {
        $query = "SELECT * FROM te_rejat";

        $stmt = $this->connectDB()->prepare($query);

        if (!$stmt->execute()) {
            $stmt = null;
            header("location: ./dboard_news.php?error=stmtfailed");
            exit();
        }

        $result = $stmt->fetchAll();

        return $result;
    }

    public function addArtikullin($title, $details, $type)
    {
        $targetDir = "../images/uploads/";
        $targetFile = $targetDir . basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile);


        $query = "INSERT INTO te_rejat (titulli, detajet, lloji_i_lajmit, photo_path) VALUES (?,?,?,?);";
        $stmt = $this->connectDB()->prepare($query);

        if (!$stmt->execute(array($title, $details, $type, $targetFile))) {
            $stmt = null;
            header("location: dboard_add_news.php?error=stmtfailed");
            exit();
        }

        header("location: dboard_news.php");

        $stmt = null;
    }
}