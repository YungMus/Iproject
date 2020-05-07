<?php

if (isset($_POST['aanmelden'])){

    require 'connectingDatabase.php';

    $gebruikersnaam = htmlspecialchars($_POST['gebruikersnaam']);
    $wachtwoord = htmlspecialchars(trim($_POST['wachtwoord']));
    $wachtwoordHerhaling = htmlspecialchars(trim($_POST['wachtwoord-herhaling']));
    $licentieCode = htmlspecialchars($_POST['licentie_code']);

    if(empty($gebruikersnaam) || empty($wachtwoord) || empty($wachtwoordHerhaling) || empty($licentieCode)){
        header("Location: aanmeldpagina.php?error=legevelden&gebruikersnaam=".$gebruikersnaam);
        exit();
    }

    else if(!preg_match("/^[a-zA-Z0-9]*$/", $gebruikersnaam)){
        header("Location: aanmeldpagina.php?error=foutegebruikersnaam");
        exit();
    }

    else if($wachtwoord !== $wachtwoordHerhaling){
        header("Location: aanmeldpagina.php?error=wachtwoordchecken&gebruikersnaam=".$gebruikersnaam);
        exit();
    }

    else if($licentieCode !== "welkom2020"){
        header("Location: aanmeldpagina.php?error=licentiecodechecken&gebruikersnaam=".$gebruikersnaam);
        exit();
    }

    else{

        $sql = "SELECT gebruikersnaam FROM inloggegevens WHERE gebruikersnaam=?";
        $stmt = mysqli_stmt_init($dbh);

        if(!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: aanmeldpagina.php?error=sqlerror");
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt, "s", $gebruikersnaam);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultaatcheck = mysqli_stmt_num_rows($stmt);
            if($resultaatcheck > 0) {
                header("Location: aanmeldpagina.php?error=gebruikersnaamalgebruikt&gebruikersnaam=".$gebruikersnaam);
                exit();
            }
            else{
                $sql = "INSERT INTO inloggegevens (gebruikersnaam, wachtwoord, licentieCode) VALUES (?, ?, ?)";
                $stmt = mysqli_stmt_init($dbh);
                if(!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: aanmeldpagina.php?error=sqlerror");
                    exit();
                }
                else{
                    $hashedWachtwoord = password_hash($wachtwoord, PASSWORD_DEFAULT);

                    mysqli_stmt_bind_param($stmt, "sss", $gebruikersnaam, $hashedWachtwoord, $licentieCode);
                    mysqli_stmt_execute($stmt);
                    header("Location: aanmeldpagina.php?aanmelden=succes");
                    exit();
                }
            }
        }

    }
    mysqli_stmt_close($stmt);
    mysqli_close($dbh);
}

else{
    header("Location: inlogpagina.php");
    exit();
}