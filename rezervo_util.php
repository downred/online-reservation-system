<?php

class rezervo_utils extends DBUtils{

    private $user_ID;
    private $id;
    private $StartDate;
    private $EndDate;
    public function __construct($user_ID, $id, $StartDate, $EndDate)
    {
        $this->user_ID = $user_ID;
        $this->id = $id;
        $this->StartDate = $StartDate;
        $this->EndDate = $EndDate;
    }

    public function initRezervimi() {
        session_start();
        $_SESSION["form_data"] = $_POST;

        if ($this->DateIsEmpty()) {
            header("location: rezervo.php?error=fieldempty");
            $_SESSION["rezervo_msg"] = "Ju lutem mbushni te gjitha hapsirat.";
            exit();
        }
        if (!$this->DatesAreValid()) {
            header("location: rezervo.php?error=DatesInvalid");
            $_SESSION["rezervo_msg"] = "Datat e rezervimit nuk jane valide.";
            exit();
        }
        if (!$this->DatesInFuture()) {
            header("location: rezervo.php?error=StartDateInvalid");
            $_SESSION["rezervo_msg"] = "Data e fillimit nuk eshte valide.";
            exit();
        }
        unset($_SESSION["rezervo_msg"]);
        $this->rezervo($this->user_ID, $this->id, $this->StartDate, $this->EndDate);
    }

    public function DateIsEmpty() {
        return empty($this->StartDate) || empty($this->EndDate);
    }

    private function DatesAreValid()
    {
        if ($this->StartDate >= $this->EndDate) {
            return false;
        }
        return true;
    }

    private function DatesInFuture()
    {
        if ($this->StartDate < date("Y/m/d")){
            return false;
        }
        return true;
    }
}