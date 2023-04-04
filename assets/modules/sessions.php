<?php
    session_start();

    function error_msg(){
        if (isset($_SESSION['error_msg'])) {
            $message =  "<div class='alert bg-danger text-white'>";
            $message .= htmlentities($_SESSION['error_msg']);
            $message .=  "</div>";

            $_SESSION['error_msg'] = null;
            return $message;
        }
    }
    function success_msg(){
        if (isset($_SESSION['success_msg'])) {
            $message =  "<div class='alert bg-success text-white'>";
            $message .= htmlentities($_SESSION['success_msg']);
            $message .=  "</div>";

            $_SESSION['success_msg'] = null;
            return $message;
        }
    }

?>
