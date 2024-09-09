<?PHP 
    SESSION_START();
    require_once('../Models/ATMModel.php');

    function sanitize ($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $AccountNumber = sanitize($_POST['AccountNumber']);
        $Balance = sanitize($_POST['Balance']);
        $Token = sanitize($_POST['Token']);
        $err1 = $err2 = $err3 = "";

        if (empty($AccountNumber)) {
            $err1 = "Account Number is required";
        }
        else {
            $_SESSION['AccountNumber'] = $AccountNumber;
        }

        if (empty($Balance)) {
            $err2 = "Balance is required";
        }
        else {
            $_SESSION['Balance'] = $Balance;
        }

        if (empty($Token)) {
            $err3 = "Token is required";
        }
        else {
            $_SESSION['Token'] = $Token;
        }

        if (empty($error)) {
            $account = getAccount($AccountNumber);
            if ($account) {
                if ($Token == $account['Token']) {
                    if ($Balance > 0) {
                        if ($Balance <= $account['Balance']) {
                            $newBalance = $account['Balance'] - $Balance;
                            updateBalance($AccountNumber, $newBalance);
                            $_SESSION['Balance'] = $newBalance;
                        }
                        else {
                            $err2 = "Insufficient funds";
                        }
                    }
                    else {
                        $err2 = "Balance must be greater than 0";
                    }
                }
                else {
                    $err3 = "Invalid Token";
                }
            }
            else {
                $err1 = "Account Number does not exist";
            }
        }
        else {
            $_SESSION['error'] = $error;
        }
        header('Location: ../Views/ATM.php');
    }
?>