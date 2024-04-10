<?php
session_start();

function ErrorMessage(){
    if(isset($_SESSION["ErrorMessage"])){
        $Output = "<div class=\"alert alert-danger\">";
        $Output .= htmlentities($_SESSION["ErrorMessage"]);
        $Output .= "</div>";
        $_SESSION["ErrorMessage"] = null;
        return $Output;
    }
};


function SuccessMesage(){
    if(isset($_SESSION["SuccessMesage"])){
        $Output = "<div class=\"alert alert-success\">";
        $Output .= htmlentities($_SESSION["SuccessMesage"]);
        $Output .= "</div>";
        $_SESSION["SuccesMessage"] = null;
        return $Output;
    }
};

?>