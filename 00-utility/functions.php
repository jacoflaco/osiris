<?php
/* ===============
	 Project: Osiris Resorts & Destinations
   Filename: functions.php
	 Creation Date: 10/15/2016

   Author: Jake Handwork
	 Modification Date: 10/18/2016
   =============== */

// ******************** validatePassword *******************
/* this function will validate if user created a strong password
* At least 10 characters and alphanumeric letters.
*/
function validatePassword($password) {
  $password = trim($password);
  if (strlen($password) < 10) {
    return false;
  }
  else {
    //go through each character and find if there is a number or letter
    $letter = false;
    $number = false;
    $chars = str_split($password);
    for($i = 0; $i < strlen($password); $i++) {
      if (preg_match("/[A-Za-z]/", $chars[$i])) {
        $letter = true;
        break;
      }
    }
    for($i = 0; $i < strlen($password); $i++) {
      if (preg_match("/[0-9]/", $chars[$i])) {
        $number = true;
        break;
      }
    }
    if (($letter == true) and ($number == true)) {
      return true;
    }
    else return false;
  }
}

// ******************** validateEmail *******************
/* This function prevents malicious users enter multiple email addresses into the email box
* It makes sure that only one email is entered into the email box.
*/
function validateEmail($email) {
  $email = filter_var($email, FILTER_SANITIZE_EMAIL);

  //filter_var() validates the e-mail
  //address using FILTER_VALIDATE_EMAIL
  if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
    return TRUE;
  }
  else {
    return FALSE;
  }
}


// ******************** randomPasswordGenerator *******************
/* This function generates a random code with letters and digits.
* The parameter tells the how long the code should be.
*/
function randomPasswordGenerator($length) {
        $code = "a2";
        for($i = 0; $i < $length; $i++){
            //generate a random number between 1 and 35
            $r = mt_rand(1,35);

            //if the number is greater than 26, minus 26 will generate a digit between 0 and 9
            if ($r > 26) {
              $r = $r - 26;
              $code = $code.$r ;
            }
            else {    //it's between 1 and 26, generate a character
              $code = $code.toChar($r);
            }
        }
        return $code;
}


// ******************** randomCodeGenerator *******************
/* This function generates a random code with letters and digits.
* The parameter tells the how long the code should be.
*/
function randomCodeGenerator($length) {
        $code = "";
        for($i = 0; $i < $length; $i++){
            //generate a random number between 1 and 35
            $r = mt_rand(1,35);

            //if the number is greater than 26, minus 26 will generate a digit between 0 and 9
            if ($r > 26) {
              $r = $r - 26;
              $code = $code.$r ;
            }
            else {    //it's between 1 and 26, generate a character
              $code = $code.toChar($r);
            }
        }
        return $code;
}

// ******************** toChar *******************
/* This function changes any randomly generated number between 1-26
* to a letter corresponding to that number
*/
function toChar($digit){
  $char = "";
  switch ($digit){
    case 1: $char = "A"; break;
    case 2: $char = "B"; break;
    case 3: $char = "C"; break;
    case 4: $char = "D"; break;
    case 5: $char = "E"; break;
    case 6: $char = "F"; break;
    case 7: $char = "G"; break;
    case 8: $char = "H"; break;
    case 9: $char = "I"; break;
    case 10: $char = "J"; break;
    case 11: $char = "K"; break;
    case 12: $char = "L"; break;
    case 13: $char = "M"; break;
    case 14: $char = "N"; break;
    case 15: $char = "O"; break;
    case 16: $char = "P"; break;
    case 17: $char = "Q"; break;
    case 18: $char = "R"; break;
    case 19: $char = "S"; break;
    case 20: $char = "T"; break;
    case 21: $char = "U"; break;
    case 22: $char = "V"; break;
    case 23: $char = "W"; break;
    case 24: $char = "X"; break;
    case 25: $char = "Y"; break;
    case 26: $char = "Z"; break;
    default: "A";

  }
  return $char;
}

// ******************** codeValidate *******************
/* this function will validate if the code is a valid activation code
*/
function validateCode($field) {
  $field = trim($field);
  if (strlen($field) != 20) {
    return false;
  }
  else {
    //go through each character and find if there is a number or letter
    $letter = false;
    $number = false;
    $chars = str_split($field);
    for($i = 0; $i < strlen($field); $i++) {
      if (preg_match("/[A-Za-z]/", $chars[$i])) {
        $letter = true;
        break;
      }
    }
    for($i = 0; $i < strlen($field); $i++) {
      if (preg_match("/[0-9]/", $chars[$i])) {
        $number = true;
        break;
      }
    }
    if (($letter == true) and ($number == true)) {
      return true;
    }
    else return false;
  }
}

// ******************** validate date *******************
/* this function will validate if the month is between 1-12, day is between 1-31, and year is between 1895 and 2016
*/
function validateDate($pMonth, $pDay, $pYear) {
  if(!is_int($pMonth)) {
    $pMonth = (int)$pMonth;
  }
  if(!is_int($pDay)) {
    $pDay = (int)$pDay;
  }
  if(!is_int($pYear)) {
    $pYear = (int)$pYear;
  }
  if($pMonth <= 12 && $pMonth > 0 && $pDay <= 31 && $pDay > 0 && $pYear >= 1895 && $pYear <= 2016) {
    return true;
  }

}
