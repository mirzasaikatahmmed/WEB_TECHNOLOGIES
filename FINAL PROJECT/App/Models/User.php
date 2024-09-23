<?PHP
require_once 'Database.php';

function getUser ($email) {
    $conn = getConnection();
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

function createUser($name, $email, $password, $role, $uniqueFileName) {
    $conn = getConnection();
    $stmt = $conn->prepare("INSERT INTO users (name, email, password, role, profile_image, created_at) VALUES (?, ?, ?, ?, ?, NOW())");
    $stmt->bind_param("sssss", $name, $email, $password, $role, $uniqueFileName);
    $stmt->execute();
    return $stmt->insert_id;
}

function getUsersByRole($role) {
    $conn = getConnection();
    $stmt = $conn->prepare("SELECT * FROM users WHERE role = ?");
    $stmt->bind_param("s", $role);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
}

?>