<?php
include_once "controller.php";
include "../model/userModel.php";

class UserController extends Controller
{

    public function __construct()
    {
    }

    public function login($request)
    {
        try {
            $userModel = new UserModel();
            
            $data = [
                'username' => $request['u_name'],
                'password' => md5($request['password'])
            ];
            $user = $userModel->first($data);
            if (!$user) {
                $this->errorMessage("Account or password is incorrect");
                return;
            }

            $_SESSION['user'] = $user;
        } catch (\Throwable $th) {
            $this->errorMessage("Login failed, server error");
            // echo $th->getMessage(); // view error
            return;
        }

        return $this->view('home');
    }

    public function createUser($request)
    {
        try {
            $userModel = new UserModel();
            $data = [
                'name' => $request['f_name'],
                'username' => $request['u_name'],
                'email' => $request['email'],
                'password' => md5($request['password']),
                'role_code' => null
            ];

            // Check duplicate usernames
            if ($userModel->first(['username' => $data['username']])) {
                $this->errorMessage("This username is already taken, please replace it");
                return;
            }

            // Check duplicate emails
            if ($userModel->first(['email' => $data['email']])) {
                $this->errorMessage("This email is already in use, please replace it");
                return;
            }

            $last_id = $userModel->create($data); // The function that creates a new user returns the id of that user

            $this->successMessage("New user successfully added");
        } catch (\Throwable $th) {
            $this->errorMessage("You cannot register a new user due to a processing error on the server");
            // echo $th->getMessage(); // view error
            return;
        }

        // Success login then redirect to login page
        return $this->view('login');
    }

    public function logout()
    {
        unset($_SESSION["user"]);
        return $this->back();
    }

    public function validateRequestLogin($data)
    {
        if (!isset($data['u_name']) || $data['u_name'] == "") {
            $this->errorMessage("Username is required");
            return false;
        }

        if (!isset($data['password']) || $data['password'] == "") {
            $this->errorMessage("Password is required");
            return false;
        }
        return true;
    }

    public function validateRequestCretaeUser($data)
    {
        if (!isset($data['f_name']) || $data['f_name'] == "") {
            $this->errorMessage("First name is required");
            return false;
        }
        if (!isset($data['u_name']) || $data['u_name'] == "") {
            $this->errorMessage("Username is required");
            return false;
        }
        if (!isset($data['email']) || !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $this->errorMessage("Email field does not match");
            return false;
        }
        if (!isset($data['password']) || $data['password'] == "") {
            $this->errorMessage("Password is required");
            return false;
        }
        if (!isset($data['c_password']) || $data['c_password'] == "") {
            $this->errorMessage("Password is required");
            return false;
        }
        if ($data['password'] != $data['c_password']) {
            $this->errorMessage("Confirm passwords not match");
            return false;
        }
        return true;
    }
}
