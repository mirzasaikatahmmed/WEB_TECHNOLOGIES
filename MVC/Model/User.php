<?php
class User extends Model {
    public function register($data) {
        $stmt = $this->db->prepare("INSERT INTO users (First_Name, Last_Name, Gender, Fathers_Name, Mothers_Name, Blood_Group, Religion, Email, Phone, Website, Address, Username, Password, Registration_Date) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())");
        $stmt->bind_param("sssssssssssss", $data['fname'], $data['lname'], $data['gender'], $data['faName'], $data['moName'], $data['bGroup'], $data['religion'], $data['email'], $data['mNumber'], $data['website'], $data['address'], $data['username'], $data['password']);
        return $stmt->execute();
    }

    public function login($username, $password) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE Username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            if ($password === $row['Password']) {
                return $row;
            }
        }
        return false;
    }
}
?>
