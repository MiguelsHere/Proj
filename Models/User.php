<?php

class User
{

    function register(): bool
    {
        try {
        } catch (Exception $e) {

            print($e);
            $_SESSION['alert'] = "Erro a registar conta. Tente novamente.";
            return false;
        }

        return true;
    }

    function login(): bool
    {
        try {
        } catch (Exception $e) {

            print($e);
            $_SESSION['alert'] = "Erro a entrar na conta. Tente novamente.";
            return false;
        }

        return true;
    }

    function logout(): bool
    {
        $_SESSION = [];
        session_destroy();

        return true;
    }

    function get_info(): bool
    {
        try {
        } catch (Exception $e) {

            print($e);
            $_SESSION['alert'] = "Erro. Tente novamente.";
            return false;
        }

        return true;
    }

    function update_info(): bool
    {
        try {
        } catch (Exception $e) {

            print($e);
            $_SESSION['alert'] = "Erro. Tente novamente.";
            return false;
        }

        return true;
    }

    //Estas vão precisar de password para mudar

    function update_email(): bool
    {
        try {
        } catch (Exception $e) {

            print($e);
            $_SESSION['alert'] = "Erro. Tente novamente.";
            return false;
        }

        return true;
    }

    function update_password(): bool
    {
        try {
        } catch (Exception $e) {

            print($e);
            $_SESSION['alert'] = "Erro. Tente novamente.";
            return false;
        }

        return true;
    }
}
