<?php

namespace App\Helpers;

<<<<<<< HEAD
class NotificationHelper
{
    public static function success($key, $message)
    {
        $_SESSION['success'][$key] = $message;
=======
class NotificationHelper{
    public static function success($key, $message)
    {
        $_SESSION['success'] [$key] = $message;
>>>>>>> fa253ba470afb82e7a467a963e3e6b86d0a08167
    }

    public static function error($key, $message)
    {
<<<<<<< HEAD
        $_SESSION['error'][$key] = $message;
=======
        $_SESSION['error'] [$key] = $message;
>>>>>>> fa253ba470afb82e7a467a963e3e6b86d0a08167
    }

    public static function unset()
    {
        unset($_SESSION['success']);
        unset($_SESSION['error']);
    }
<<<<<<< HEAD
}
=======
}
>>>>>>> fa253ba470afb82e7a467a963e3e6b86d0a08167
