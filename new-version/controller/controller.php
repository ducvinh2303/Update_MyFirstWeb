<?php
date_default_timezone_set("Asia/Ho_Chi_Minh");
session_start();

class Controller
{
    public function view($view)
    {
        header("Location: " . $view);
        exit;
    }

    public function back()
    {
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit;
    }

    public function successMessage(string $message = "Thao thác thành công !")
    {
        $_SESSION['success'] = $message;
    }

    public function errorMessage(string $message = "Thao thác thất bại !")
    {
        $_SESSION['error'] = $message;
    }
}
