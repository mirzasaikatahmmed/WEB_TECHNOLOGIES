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
                <td>
                    <fieldset>
                        <legend>General Information</legend>
                        <table>
                            <tr>
                                <label for="fname"><strong> First Name : </strong></label>
                                <input type="text" id="fname" name="fname" placeholder="Your First Name" value="<?php echo isset($_SESSION['fname']) ? $_SESSION['fname'] : "" ;?>">
                                <?php echo isset($_SESSION['fnameErr']) ? $_SESSION['fnameErr'] : ""; ?>
                                <br><br>
                            </tr>
                            <tr>
                                <label for="lname"><strong>Last Name : </strong></label>
                                <input type="text" id="lname" name="lname" placeholder="Your Last Name"value="<?php echo isset($_SESSION['lname']) ? $_SESSION['lname'] : "" ;?>">
                                <?php echo isset($_SESSION['lnameErr']) ? $_SESSION['lnameErr'] : ""; ?>
                                <br><br>
                            </tr>
                            <tr>
                                <label for="gender"><strong>Gender : </strong></label>
                                <input type="radio" id="male" name="gender" placeholder="Male" checked>
                                <label for="male">Male</label>
                                <input type="radio" id="female" name="gender" placeholder="Female">
                                <label for="female">Female</label><br><br>
                                
                            </tr>
                            <tr>
                                <label for="faName"><strong>Father's Name : </strong></label>
                                <input type="text" id="faName" name="faName" placeholder="Your Father's Name" value="<?php echo isset($_SESSION['faName']) ? $_SESSION['faName'] : "" ;?>">
                                <?php echo isset($_SESSION['faNameErr']) ? $_SESSION['faNameErr'] : ""; ?>
                                <br><br>
                            </tr>
                            <tr>
                                <label for="moName"><strong>Mother's Name : </strong></label>
                                <input type="text" id="moName" name="moName" placeholder="Your Mother's Name" value="<?php echo isset($_SESSION['moName']) ? $_SESSION['moName'] : "" ;?>">
                                <?php echo isset($_SESSION['moNameErr']) ? $_SESSION['moName'] : ""; ?>
                                <br><br>
                            </tr>
                            <tr>
                                <label for="bGroup"><strong>Blood Group : </strong></label>
                                <select id="bGroup" name="bGroup">
                                    <option value="A+">A+</option>
                                    <option value="B+">B+</option>
                                    <option value="AB+">AB+</option>
                                    <option value="O+">O+</option>
                                    <option value="A-">A-</option>
                                    <option value="B-">B-</option>
                                    <option value="AB-">AB-</option>
                                    <option value="O-">O-</option>
                                </select><br><br>
                            </tr>
                            <tr>
                                <label for="religion"><strong>Religion : </strong></label>
                                <select id="religion" name="religion">
                                    <option value="Islam">Islam</option>
                                    <option value="Hindu">Hindu</option>
                                </select>
                            </tr>
                        </table>
                    </fieldset>
                </td>
                <td>
                    <fieldset>
                        <legend>Contact Information</legend>
                        <table>
                            <tr>
                                <label for="email"><strong>Email : </strong></label>
                                <input type="text" id="email" name="email" placeholder="Your Email Address" value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : "" ;?>">
                                <?php echo isset($_SESSION['emailErr']) ? $_SESSION['emailErr'] : ""; ?>
                                <br><br>
                            </tr>
                            <tr>
                                <label for="mNumber"><strong>Phone/Mobile : </strong></label>
                                <input type="number" id="mNumber" name="mNumber" placeholder="Your Contact Number" value="<?php echo isset($_SESSION['mNumber']) ? $_SESSION['mNumber'] : "" ;?>">
                                <?php echo isset($_SESSION['mNumberErr']) ? $_SESSION['mNumberErr'] : ""; ?>
                                <br><br>
                            </tr>
                            <tr>
                                <label for="website"><strong>Website : </strong></label>
                                <input type="url" id="website" name="website" placeholder="Your Website URL" value="<?php echo isset($_SESSION['website']) ? $_SESSION['website'] : "" ;?>">
                                <?php echo isset($_SESSION['websiteErr']) ? $_SESSION['websiteErr'] : ""; ?>
                                <br><br>
                            </tr>
                        </table>
                    </fieldset>
                </td>
                <td>
                    <fieldset>
                        <legend>Account Information</legend>
                        <table>
                            <tr>
                                <label for="username"><strong>Username : </strong></label>
                                <input type="text" id="username" name="username" placeholder="Username" value="<?php echo isset($_SESSION['username']) ? $_SESSION['username'] : "" ;?>">
                                <?php echo isset($_SESSION['usernameErr']) ? $_SESSION['usernameErr'] : ""; ?>
                                <br><br>
                            </tr>
                            <tr>
                                <label for="password"><strong>Password : </strong></label>
                                <input type="password" id="password" name="password" placeholder="Password" value="<?php echo isset($_SESSION['faName']) ? $_SESSION['faName'] : "" ;?>">
                                <?php echo isset($_SESSION['passwordErr']) ? $_SESSION['passwordErr'] : ""; ?>
                                <br><br>
                            </tr>
                        </table>
                    </fieldset><br>
                    <input type="submit" value="Register">
                </td>
            </table>
        </form>
</body>
</html>