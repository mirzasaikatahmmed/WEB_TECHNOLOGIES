<?php
class DashboardController extends Controller {
    public function index() {
        session_start();
        if (!isset($_SESSION['Username'])) {
            header("Location: /Login");
            exit();
        }

        $this->view('dashboard');
    }

    public function logout() {
        session_start();
        session_destroy();
        header("Location: /Login");
    }
}
?>
