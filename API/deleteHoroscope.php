<?php 

try {
    //För att använda $_SESSION
    session_start();

    //Kollar om en request har gjorts
    if(isset($_SERVER["REQUEST_METHOD"])) {

        if($_SERVER["REQUEST_METHOD"] === "DELETE") {
            //REQUEST_METHOD är DELETE

            if(isset($_SESSION["Horoscope"])) {
                
                unset($_SESSION["Horoscope"]);

                echo json_encode(true);
                exit;

            } else {
                echo json_encode(false);
                exit;
            }
       
        } else { 
            //om metoden inte är delete ska den inte svara
            throw new Exception("Not a valid request...", 400);
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