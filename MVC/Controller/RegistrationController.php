<?php
class RegistrationController extends Controller {
    public function index() {
        $this->view('registration', ['message' => '']);
    }

    public function register() {
        $user = $this->model('User');
        $data = [
            'fname' => $_POST['fname'],
            'lname' => $_POST['lname'],
            'gender' => $_POST['gender'],
            'faName' => $_POST['faName'],
            'moName' => $_POST['moName'],
            'bGroup' => $_POST['bGroup'],
            'religion' => $_POST['religion'],
            'email' => $_POST['email'],
            'mNumber' => $_POST['mNumber'],
            'website' => $_POST['website'],
            'country' => $_POST['country'],
            'city' => $_POST['city'],
            'pAddress' => $_POST['pAddress'],
            'zip' => $_POST['zip'],
            'username' => $_POST['username'],
            'password' => $_POST['password'],
            'address' => $_POST['pAddress'] . ", " . $_POST['city'] . "-" . $_POST['zip'] . ", " . $_POST['country']
        ];

        if ($user->register($data)) {
            header("Location: /Login");
        } else {
            $this->view('registration', ['message' => 'Registration failed']);
        }
    }
}
?>
