<?php
class LoginController extends Controller {
    public function index() {
        $this->view('login', ['message' => '']);
    }

    public function authenticate() {
        session_start();
        $user = $this->model('User');
        $username = $_POST['username'];
        $password = $_POST['password'];

        $user_data = $user->login($username, $password);

        if ($user_data) {
            $_SESSION['Username'] = $username;
            $_SESSION['First_Name'] = $user_data['First_Name'];
            $_SESSION['Last_Name'] = $user_data['Last_Name'];
            $_SESSION['loggedInTime'] = time();
            header("Location: /Dashboard");
        } else {
            $this->view('login', ['message' => 'Invalid username or password']);
        }
    }
}
?>
