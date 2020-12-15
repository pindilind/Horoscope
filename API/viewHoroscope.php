
<?php

try {
    //För att använda $_SESSION
    session_start();

    //Kollar om en request har gjorts
    if (isset($_SERVER["REQUEST_METHOD"])) {

        if ($_SERVER["REQUEST_METHOD"] === "GET") {
            //REQUEST_METHOD is GET

            //kollar om horoscope finns i session
            if (isset($_SESSION["Horoscope"])) {

                //skickar tillbaka sparat horoscope to klient
                echo json_encode(unserialize($_SESSION["Horoscope"]));
                exit;
            } else {
                //skickar feedback att inget horoskop är sparat
                echo json_encode("No horoscope is saved...");
                exit;
            }
        } else {
            throw new Exception("Not a valid request...", 400);
        }
    }
} catch (Exception $error) {
    echo json_encode(
        array(
            "Message" => $error->getMessage(),
            "Status" => $error->getCode()
        )
    );
    exit;
}


?>
