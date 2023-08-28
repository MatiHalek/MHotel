<?php
    error_reporting(0);
    session_start();
    if(!isset($_POST["username"]) || !isset($_POST["password"]))
    {
        header("Location: ./");
        exit();
    }
    if($_POST["username"] == "admin" && $_POST["password"] == "qwerty")
    {
        $_SESSION["logged"] = true;
        $_SESSION["username"] = $_POST["username"];
        unset($_SESSION["error"]);
    }
    else
    {
        $_SESSION["error"] = "<div class='alert alert-danger'><strong>Nieprawidłowa nazwa użytkownika lub hasło.</strong></div>";
        header("Location: ./");
    }
    if(isset($_SERVER['HTTP_REFERER']))
        header("Location: ".$_SERVER['HTTP_REFERER']);  
    else
        header("Location: ./");  
?>