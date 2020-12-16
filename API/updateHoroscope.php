<?php 

function horoscope($day, $month) { 
    
    $horoscope = ""; 

        if (($month == 3 && $day > 20) || ($month == 4 && $day < 20 )) { $horoscope = "Väduren"; }
        elseif (($month == 4 && $day > 19 ) || ($month == 5 && $day < 21 )) { $horoscope = "Oxen"; }
        elseif (($month == 5 && $day > 20 ) || ($month == 6 && $day < 23 )) { $horoscope = "Tvillingarna"; }
        elseif (($month == 6 && $day > 20 ) || ($month == 7 && $day < 23 )) { $horoscope = "Kräftan"; }
        elseif (($month == 7 && $day > 22 ) || ($month == 8 && $day < 23 )) { $horoscope = "Lejonet"; }
        elseif (($month == 8 && $day > 22 ) || ($month == 9 && $day < 23 )) { $horoscope = "Jungfru"; }
        elseif (($month == 9 && $day > 22 ) || ($month == 10 && $day < 23 )) { $horoscope = "Vågen"; }
        elseif (($month == 10 && $day > 22 ) || ($month == 11 && $day < 22 )) { $horoscope = "Skorpionen"; }
        elseif (($month == 11 && $day > 21 ) || ($month == 12 && $day < 22 )) { $horoscope = "Skytten"; }
        elseif (($month == 12 && $day > 21 ) || ($month == 1 && $day < 20 )) { $horoscope = "Stenbocken"; }
        elseif (($month == 1 && $day > 19 ) || ($month == 2 && $day < 19 )) { $horoscope = "Vattumannen"; }
        elseif (($month == 2 && $day > 18 ) || ($month == 3 && $day < 21 )) { $horoscope = "Fiskarna"; }
        
        return $horoscope;
        
}

try {
    //För att använda $_SESSION
    session_start();

    //Kollar om en request har gjorts
    if(isset($_SERVER["REQUEST_METHOD"])) {

        if($_SERVER["REQUEST_METHOD"] === "POST") {
            //REQUEST_METHOD är POST

            if(!isset($_SESSION["Horoscope"])) {

                echo json_encode(false);
                exit;
            }

            //kollar om det finns sparat på body
            if(isset($_POST["day"]) && isset($_POST["month"]))  {
                
                $yourHoroscope = horoscope($_POST["day"],$_POST["month"]);
                //sparar $_POST horoscope går till session
                $_SESSION["Horoscope"] = serialize($yourHoroscope);
                
                echo json_encode(true);
                exit;
                
            } else {
               
                throw new Exception("No birthday is set to body... :( ", 500);
            }
       
        } else { 
            //denna visas om inget siffror va inkluderarde
            throw new Exception("Not a valid request...", 405);
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
