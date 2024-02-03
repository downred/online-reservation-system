<?php

class rezervo_form
{
    public function rezervo_popUp($ID)
    {
        if (isset($_POST["ID"])) :$ID = isset($_POST["ID"]) ; unset($_POST);?>
        <?php 
            
            ?>
            <div class="form-popup" id="popup">
                <h1>Enter the dates of your reservation</h1>
                <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                    <div class="form-container">
                        <div class="date-holder">
                            <p>Nga: <input type="date" id="StartDate" name="StartDate"></p>
                            <p>Deri: <input type="date" id="EndDate" name="EndDate"></p>
                            <input type="hidden" name="ID" id="" value="<?php echo $ID ?>">
                        </div>
                        <p style="visibility: hidden;" id="error-msg"></p>
                        <div class="button-holder">
                            <button class="cancel" >Anulo</button>
                            <button class="rezervo-btn" type="submit" name="insert">Rezervo</button>
                        </div>
                    </div>
                </form>
            </div>
            
            <?php endif;

            $Holet_ID = $_POST["ID"];
            $Start = $_POST["StartDate"];
            $End = $_POST["EndaDate"];
            return(array($Holet_ID, $Start, $End));




        }
    }
?>