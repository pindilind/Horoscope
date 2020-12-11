<?php 

echo horoscope(15,1);
function horoscope($day, $month) 
 { 
    $horoscope = ""; 

        if ( ( $month == 3 && $day > 20 ) || ( $month == 4 && $day < 20 ) ) { $horoscope = "Väduren"; } 
        elseif ( ( $month == 4 && $day > 19 ) || ( $month == 5 && $day < 21 ) ) { $horoscope = "Oxen"; } 
        elseif ( ( $month == 5 && $day > 20 ) || ( $month == 6 && $day < 21 ) ) { $horoscope= "Tvillingarna"; } 
        elseif ( ( $month == 6 && $day > 20 ) || ( $month == 7 && $day < 23 ) ) { $horoscope = "Kräftan"; } 
        elseif ( ( $month == 7 && $day > 22 ) || ( $month == 8 && $day < 23 ) ) { $horoscope = "Lejonet"; } 
        elseif ( ( $month == 8 && $day > 22 ) || ( $month == 9 && $day < 23 ) ) { $horoscope= "Jungfrun"; } 
        elseif ( ( $month == 9 && $day > 22 ) || ( $month == 10 && $day < 23 ) ) { $horoscope = "Vågen"; } 
        elseif ( ( $month == 10 && $day > 22 ) || ( $month == 11 && $day < 22 ) ) { $horoscope = "Skorpionen"; } 
        elseif ( ( $month == 11 && $day > 21 ) || ( $month == 12 && $day < 22 ) ) { $horoscope = "Skytten"; } 
        elseif ( ( $month == 12 && $day > 21 ) || ( $month == 1 && $day < 20 ) ) { $horoscope = "Stenbocken"; } 
        elseif ( ( $month == 1 && $day > 19 ) || ( $month == 2 && $day < 19 ) ) { $horoscope = "Vattumannen"; } 
        elseif ( ( $month == 2 && $day > 18 ) || ( $month == 3 && $day < 21 ) ) { $horoscope = "Fiskarna"; } 
        
        return $horoscope;
        
}

?>