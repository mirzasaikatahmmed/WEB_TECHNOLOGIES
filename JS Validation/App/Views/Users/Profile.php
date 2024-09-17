<?php
include_once '../Layouts/header.php';
include_once '../../Config/Database.php';
include_once '../../Models/UserModel.php';

if (empty($_SESSION['isLoggedIn'])) {
    $_SESSION['err3'] = "Unauthorized Access...!";
    header("Location: ../Authentication/Login.php");
    die();
} else if ($_SESSION['isLoggedIn'] === false) {
    $_SESSION['err3'] = "Unauthorized Access...!";
    header("Location: ../Authentication/Login.php");
    die();
}

$conn = getConnection();
$email = $_SESSION['email'];
$userID = getIDByEmail($conn, $email);
$query = "SELECT * FROM users WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $userID);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
?>

<head>
    <style>
        .profile {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .profile h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input[type="text"],
        .form-group input[type="email"] {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }
        .form-group input[type="radio"] {
            margin-right: 5px;
        }
        .form-group div {
            display: flex;
            align-items: center;
        }
        .form-group div label {
            margin-right: 10px;
        }
        #submit {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        #submit:hover {
            background-color: #0056b3;
        }
        .error {
            color: red;
            text-align: center;
            margin-top: 10px;
        }
    </style>
    <script>
        function validateForm() {
            var name = document.getElementById('name').value;
            var studentId = document.getElementById('student_id').value;
            var genderMale = document.getElementById('gender_male').checked;
            var genderFemale = document.getElementById('gender_female').checked;
            var error = '';

            if (name.trim() === '') {
                error += 'Name is required.<br>';
            }
            if (studentId.trim() === '') {
                error += 'Student ID is required.<br>';
            }
            if (!genderMale && !genderFemale) {
                error += 'Gender is required.<br>';
            }

            if (error) {
                document.getElementById('error-message').innerHTML = error;
                return false;
            }
            return true;
        }
    </script>
</head>
    <div class="profile">
        <h2>Profile</h2>
        <form id="profile-form" action="../../Controllers/ProfileController.php" method="POST" onsubmit="return validateForm()" novalidate>
            <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" value="<?php echo $user['name']; ?>">
            </div>
            <div class="form-group">
                <label for="student_id">Student ID</label>
                <input type="text" name="student_id" id="student_id" value="<?php echo $user['student_id']; ?>">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="<?php echo $user['email']; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="gender">Gender</label>
                <div>
                    <input type="radio" name="gender" id="gender_male" value="male" <?php echo ($user['gender'] == 'male') ? 'checked' : ''; ?>>
                    <label for="gender_male">Male</label>
                    <input type="radio" name="gender" id="gender_female" value="female" <?php echo ($user['gender'] == 'female') ? 'checked' : ''; ?>>
                    <label for="gender_female">Female</label>
                </div>
            </div>
            <button id="submit" type="submit">Update</button>

            <div id="error-message" class="error"></div>
        </form>
    </div>

<?php include_once '../Layouts/footer.php'; ?>