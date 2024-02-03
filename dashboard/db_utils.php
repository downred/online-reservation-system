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

    public function getTeRejat()
    {
        $query = "SELECT te_rejat.*, perdoruesi.* 
          FROM te_rejat
          JOIN perdoruesi ON te_rejat.perdoruesi_id = perdoruesi.perdoruesi_id";

        $stmt = $this->connectDB()->prepare($query);

        if (!$stmt->execute()) {
            $stmt = null;
            header("location: ./dboard_news.php?error=stmtfailed");
            exit();
        }

        $result = $stmt->fetchAll();

        return $result;
    }

    public function getArtikullinByID($id)
    {
        $query = "SELECT * FROM te_rejat WHERE te_rejat_id = $id";

        $stmt = $this->connectDB()->prepare($query);

        if (!$stmt->execute()) {
            $stmt = null;
            header("location: ./dboard_news.php?error=stmtfailed");
            exit();
        }

        $result = $stmt->fetchAll();

        return $result;
    }

    public function addArtikullin($title, $details, $type, $admin_id)
    {
        $targetDir = "./images/uploads/";
        $targetFile = $targetDir . basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], "." . $targetFile);


        $query = "INSERT INTO te_rejat (titulli, detajet, lloji_i_lajmit, photo_path, perdoruesi_id) VALUES (?,?,?,?,?);";
        $stmt = $this->connectDB()->prepare($query);

        if (!$stmt->execute(array($title, $details, $type, $targetFile, $admin_id))) {
            $stmt = null;
            header("location: dboard_manage_news.php?error=stmtfailed");
            exit();
        }

        header("location: dboard_news.php");

        $stmt = null;
    }

    public function deleteArtikullin($article_id)
    {
        $image_query = "SELECT photo_path FROM te_rejat WHERE te_rejat_id = $article_id";

        $stmt = $this->connectDB()->prepare($image_query);

        if (!$stmt->execute()) {
            $stmt = null;
            header("location: dboard_manage_news.php?error=stmtfailed");
            exit();
        }

        $image_result = $stmt->fetchAll();

        if (!empty($image_result)) {
            $image_row = $image_result[0];
            $image_path = $image_row['photo_path'];

            $delete_query = "DELETE FROM te_rejat WHERE te_rejat_id = ?";
            $stmt = $this->connectDB()->prepare($delete_query);

            if (!$stmt->execute([$article_id])) {
                $stmt = null;
                header("location: dboard_manage_news.php?error=stmtfailed");
                exit();
            }

            if ($image_path && file_exists($image_path)) {
                unlink($image_path);
            }
        }

    }
    public function getMesazhet()
    {
        $query = "SELECT * FROM mesazhi";

        $stmt = $this->connectDB()->prepare($query);

        if (!$stmt->execute()) {
            $stmt = null;
            header("location: ./dboard_news.php?error=stmtfailed");
            exit();
        }

        $result = $stmt->fetchAll();

        return $result;
    }
    public function deleteMesazhin($mesazhi_ID)
    {
        $query = "DELETE FROM mesazhi WHERE mesazhi_ID = ?";
        $stmt = $this->connectDB()->prepare($query);

        $stmt->bindParam(1, $mesazhi_ID, PDO::PARAM_INT);

        if (!$stmt->execute()) {
            $stmt = null;
            header("location: dboard_mesazhet.php?error=stmtfailed");
            exit();
        }
        header("location: dboard_delete_messages.php?deleteSuccessful=true");
        $stmt = null;
    }

    public function updateArtikullin($id, $titulli, $detajet, $type, $admin_id)
    {
        $targetDir = "./images/uploads/";
        $targetFile = $targetDir . basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], "." . $targetFile);

        if ($_FILES["image"]["name"] == "") {
            $query = "UPDATE te_rejat SET titulli=?, detajet=?, lloji_i_lajmit=?, perdoruesi_id = ? WHERE te_rejat_id=?";
        } else {
            $query = "UPDATE te_rejat SET titulli=?, detajet=?, lloji_i_lajmit=?, photo_path=?, perdoruesi_id=? WHERE te_rejat_id=?";
        }

        $stmt = $this->connectDB()->prepare($query);

        if ($_FILES["image"]["name"] == "") {
            if (!$stmt->execute(array($titulli, $detajet, $type, $admin_id, $id))) {
                $stmt = null;
                header("location: dboard_manage_news.php?error=stmtfailed");
                exit();
            }
        } else {
            if (!$stmt->execute(array($titulli, $detajet, $type, $targetFile, $admin_id, $id))) {
                $stmt = null;
                header("location: dboard_manage_news.php?error=stmtfailed");
                exit();
            }
        }

        header("location: dboard_news.php");

        $stmt = null;
    }
    public function addHoteli($emri, $adresa, $pershkrimi, $cmimi, $admin_id, $rating)
    {
        
        
        $targetDir = "./images/uploads/";
        $targetFile = $targetDir . basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], "." . $targetFile);


        $query = "INSERT INTO hoteli(emri, adresa, pershkrimi, cmimi_per_nate, rating, photo_path, perdoruesi_id) VALUES (?,?,?,?,?,?,?);";
        $stmt = $this->connectDB()->prepare($query);

        if (!$stmt->execute(array($emri, $adresa, $pershkrimi, $cmimi, $rating, $targetFile, $admin_id))) {
            $stmt = null;
            header("location: dboard_hotelet_add.php?error=stmtfailed");
            exit();
        }

        header("location: dboard_hotelet_add.php");

        $stmt = null;


    }

    public function getHotelet()
    {
        $query = "SELECT hoteli.*, perdoruesi.emri as p_emri, perdoruesi.mbiemri as p_mbiemri
          FROM hoteli
          JOIN perdoruesi ON hoteli.perdoruesi_id = perdoruesi.perdoruesi_id";

        $stmt = $this->connectDB()->prepare($query);

        if (!$stmt->execute()) {
            $stmt = null;
            header("location: ./rezervo.php?error=stmtfailed");
            exit();
        }

        $result = $stmt->fetchAll();

        return $result;
    }

    public function getHotelById($id)
    {
        $query = "SELECT * FROM hoteli where hoteli_id  = $id";

        $stmt = $this->connectDB()->prepare($query);

        if (!$stmt->execute()) {
            $stmt = null;
            header("location: ./dboard_manage_hotel.php?error=stmtfailed");
            exit();
        }

        $result = $stmt->fetchAll();

        return $result;
    }

    public function updateHotel($emri, $adresa, $pershkrimi, $cmimi, $rating, $admin_id, $id)
    {
        $targetDir = "./images/uploads/";
        $targetFile = $targetDir . basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], "." . $targetFile);

        if ($_FILES["image"]["name"] == "") {
            $query = "UPDATE hoteli SET emri=?, adresa=?, pershkrimi=?, cmimi_per_nate=?, rating=?, perdoruesi_id=? WHERE hoteli_id =?;";

        } else {
            $query = "UPDATE hoteli SET emri=?, adresa=?, pershkrimi=?, cmimi_per_nate=?, rating=?, photo_path=?, perdoruesi_id=? WHERE hoteli_id =?;";

        }

        $stmt = $this->connectDB()->prepare($query);

        if ($_FILES["image"]["name"] == "") {
            if (!$stmt->execute(array($emri, $adresa, $pershkrimi, $cmimi, $rating, $admin_id, $id))) {
                $stmt = null;
                header("location: dboard_hotelet_add.php?error=stmtfailed");
                exit();
            }
        } else {
            if (!$stmt->execute(array($emri, $adresa, $pershkrimi, $cmimi, $rating, $targetFile, $admin_id, $id))) { //file
                $stmt = null;
                header("location: dboard_hotelet_add.php?error=stmtfailed");
                exit();
            }
        }

        header("location: dboard_hotelet_add.php.php");

        $stmt = null;
    }

    public function deleteHotel($hoteli_id)
    {
        $query = "DELETE FROM hoteli WHERE hoteli_id = ?";
        $stmt = $this->connectDB()->prepare($query);

        $stmt->bindParam(1, $hoteli_id, PDO::PARAM_INT);

        if (!$stmt->execute()) {
            $stmt = null;
            header("location: dboard_hotelet_add.php?error=stmtfailed");
            exit();
        }
        header("location: dboard_hotelet_add.php?deleteSuccessful=true");
        $stmt = null;
    }
    
    public function rezervo($user_ID, $id, $StartDate, $EndDate)
    {

        $query = "INSERT INTO rezervimi (perdoruesi_id, hoteli_id, date_from, date_to) VALUES (?,?,?,?);";
        $stmt = $this->connectDB()->prepare($query);

        if (!$stmt->execute(array($user_ID, $id, $StartDate, $EndDate))) {
            $stmt = null;
            header("location: rezervo.php?error=stmtfailed");
            exit();
        }

        header("location: rezervo.php?sendingSuccessful=true");

        $stmt = null;
    }

}