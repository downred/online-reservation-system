<?php
class kontaktContr extends insertMessage{

    private $name;
    private $lastname;
    private $email;
    private $message;

    public function __construct($name, $lastname, $email, $message){
        $this->name = $name;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->message = $message;
    }

    public function send_message() {

        if ($this->fieldIsEmpty()) {
            header("location: kontakt.php?error=fieldempty");
            $_SESSION["error_msg"] = "Ju lutem shenoni te gjitha te dhenat.";
            exit();
        }
        if (!$this->emailIsValid()) {
            header("location: kontakt.php?error=emailinvalid");
            $_SESSION["error_msg"] = "Ju lutem shenoni nje e-mail valid.";
            exit();
        }       

        $this->addMessage($this->name, $this->lastname, $this->email, $this->message);
    }

    public function fieldIsEmpty() {
        return empty($this->name) || empty($this->lastname) || empty($this->email) || empty( $this->message);
    }

    private function emailIsValid()
    {
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }
        return true;
    }

}