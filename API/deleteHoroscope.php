<?php 

try {
    //För att använda $_SESSION
    session_start();

    //Kollar om en request har gjorts
    if(isset($_SERVER["REQUEST_METHOD"])) {

        if($_SERVER["REQUEST_METHOD"] === "POST") {
            //REQUEST_METHOD är POST

            //kollar om det finns sparat på body
            if(isset($_POST["day"]) && isset($_POST["month"]))  {
                
                $yourHoroscope = horoscope($_POST["day"],$_POST["month"]);
                //ta bort $_POST horoscope går till session
                unset($_SESSION["Horoscope"]);
                
                echo json_encode(true);
                exit;
                
            } else {
               
                throw new Exception("No birthday is set to body... :( ", 500);
            }
       
        } else { 
            //denna visas om inget siffror va inkluderarde
            throw new Exception("Not a valid request...", 404);
        }

    } 
    
} catch (Exception $error) {
    echo json_encode(
        array(
            "Message" => $error -> getMessage(),
            "Status" => $error -> getCode()
        )
    );
    exit;
}
?>