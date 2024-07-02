<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>
<body>
    <h1>Registration</h1>
    <form action="RegistrationAction.php" method="POST" novalidate>
        <table>
            <tr>
                <td>
                    <fieldset>
                        <legend>General Information</legend>
                        <label for="fname"><strong>First Name:</strong></label>
                        <input type="text" id="fname" name="fname" placeholder="Your First Name" value="<?php echo isset($_SESSION['fname']) ? $_SESSION['fname'] : ""; ?>">
                        <?php echo isset($_SESSION['fnameErr']) ? $_SESSION['fnameErr'] : ""; ?>
                        <br><br>

                        <label for="lname"><strong>Last Name:</strong></label>
                        <input type="text" id="lname" name="lname" placeholder="Your Last Name" value="<?php echo isset($_SESSION['lname']) ? $_SESSION['lname'] : ""; ?>">
                        <?php echo isset($_SESSION['lnameErr']) ? $_SESSION['lnameErr'] : ""; ?>
                        <br><br>

                        <label><strong>Gender:</strong></label>
                        <input type="radio" id="male" name="gender" value="Male" checked>
                        <label for="male">Male</label>
                        <input type="radio" id="female" name="gender" value="Female">
                        <label for="female">Female</label>
                        <br><br>

                        <label for="faName"><strong>Father's Name:</strong></label>
                        <input type="text" id="faName" name="faName" placeholder="Your Father's Name" value="<?php echo isset($_SESSION['faName']) ? $_SESSION['faName'] : ""; ?>">
                        <?php echo isset($_SESSION['faNameErr']) ? $_SESSION['faNameErr'] : ""; ?>
                        <br><br>

                        <label for="moName"><strong>Mother's Name:</strong></label>
                        <input type="text" id="moName" name="moName" placeholder="Your Mother's Name" value="<?php echo isset($_SESSION['moName']) ? $_SESSION['moName'] : ""; ?>">
                        <?php echo isset($_SESSION['moNameErr']) ? $_SESSION['moNameErr'] : ""; ?>
                        <br><br>

                        <label for="bGroup"><strong>Blood Group:</strong></label>
                        <select id="bGroup" name="bGroup">
                            <option value="A+">A+</option>
                            <option value="B+">B+</option>
                            <option value="AB+">AB+</option>
                            <option value="O+">O+</option>
                            <option value="A-">A-</option>
                            <option value="B-">B-</option>
                            <option value="AB-">AB-</option>
                            <option value="O-">O-</option>
                        </select>
                        <br><br>

                        <label for="religion"><strong>Religion:</strong></label>
                        <select id="religion" name="religion">
                            <option value="Islam">Islam</option>
                            <option value="Hindu">Hindu</option>
                        </select>
                    </fieldset>
                </td>
                <td>
                    <fieldset>
                        <legend>Contact Information</legend>
                        <label for="email"><strong>Email:</strong></label>
                        <input type="text" id="email" name="email" placeholder="Your Email Address" value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ""; ?>">
                        <?php echo isset($_SESSION['emailErr']) ? $_SESSION['emailErr'] : ""; ?>
                        <br><br>

                        <label for="mNumber"><strong>Phone/Mobile:</strong></label>
                        <input type="number" id="mNumber" name="mNumber" placeholder="Your Contact Number" value="<?php echo isset($_SESSION['mNumber']) ? $_SESSION['mNumber'] : ""; ?>">
                        <?php echo isset($_SESSION['mNumberErr']) ? $_SESSION['mNumberErr'] : ""; ?>
                        <br><br>

                        <label for="website"><strong>Website:</strong></label>
                        <input type="url" id="website" name="website" placeholder="Your Website URL" value="<?php echo isset($_SESSION['website']) ? $_SESSION['website'] : ""; ?>">
                        <?php echo isset($_SESSION['websiteErr']) ? $_SESSION['websiteErr'] : ""; ?>
                        <br><br>

                        <label>Address: </label>
                        <fieldset>
                            <legend>Present Address</legend>
                            <label for="country"><strong>Country:</strong></label>
                            <select id="country" name="country">
                                <option value="Bangladesh">Bangladesh</option>
                                <option value="India">India</option>
                                <option value="Pakistan">Pakistan</option>
                                <option value="Sri Lanka">Sri Lanka</option>
                            </select>
                            <br><br>

                            <label for="city"><strong>City:</strong></label>
                            <select id="city" name="city">
                                <option value="Dhaka">Dhaka</option>
                                <option value="Chittagong">Chittagong</option>
                                <option value="Rajshahi">Rajshahi</option>
                                <option value="Khulna">Khulna</option>
                            </select>
                            <br><br>

                            <label for="pAddress"><strong>Present Address:</strong></label><br>
                            <textarea id="pAddress" name="pAddress" rows="4" cols="50"><?php echo isset($_SESSION['pAddress']) ? $_SESSION['pAddress'] : ""; ?></textarea><br><br>
                            <label for="zip"><strong>ZIP Code:</strong></label>
                            <input type="number" id="zip" name="zip" placeholder="ZIP Code" value="<?php echo isset($_SESSION['zip']) ? $_SESSION['zip'] : ""; ?>">
                            <?php echo isset($_SESSION['zipErr']) ? $_SESSION['zipErr'] : ""; ?>
                        </fieldset>
                    </fieldset>
                </td>
                <td>
                    <fieldset>
                        <legend>Account Information</legend>
                        <label for="username"><strong>Username:</strong></label>
                        <input type="text" id="username" name="username" placeholder="Username" value="<?php echo isset($_SESSION['username']) ? $_SESSION['username'] : ""; ?>">
                        <?php echo isset($_SESSION['usernameErr']) ? $_SESSION['usernameErr'] : ""; ?>
                        <br><br>

                        <label for="password"><strong>Password:</strong></label>
                        <input type="password" id="password" name="password" placeholder="Password" value="<?php echo isset($_SESSION['password']) ? $_SESSION['password'] : ""; ?>">
                        <?php echo isset($_SESSION['passwordErr']) ? $_SESSION['passwordErr'] : ""; ?>
                        <br><br>

                        <label for="cPassword"><strong>Confirm Password:</strong></label>
                        <input type="password" id="cPassword" name="cPassword" placeholder="Confirm Password" value="<?php echo isset($_SESSION['cPassword']) ? $_SESSION['cPassword'] : ""; ?>">
                        <?php echo isset($_SESSION['cPasswordErr']) ? $_SESSION['cPasswordErr'] : ""; ?>
                        <br><br>
                        
                        <input type="submit" value="Register">
                    </fieldset>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
