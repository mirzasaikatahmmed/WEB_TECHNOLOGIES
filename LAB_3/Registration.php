<html>
    <head>
        <title>Registration</title>
    </head>
    <body>
        <h1>Registration</h1>
        <table>
        <td>
            <fieldset>
                <legend>General Information</legend>
                <table>
                    <tr>
                        <label><strong> First Name : </strong><?php echo $_POST['fname']; ?></label><br><br>
                    </tr>
                    <tr>
                        <label><strong>Last Name : </strong><?php echo $_POST['lname']; ?></label><br><br>
                    </tr>
                            <tr>
                                <label for="gender"><strong>Gender : </strong><?php echo $_POST['gender']; ?></label><br><br>
                                
                            </tr>
                            <tr>
                                <label for="faName"><strong>Father's Name : </strong><?php echo $_POST['faName'] . ' '; ?></label>
                                <input type="file"><br><br>
                            </tr>
                            <tr>
                                <label for="moName"><strong>Mother's Name : </strong><?php echo $_POST['moName']; ?></label><br><br>
                            </tr>
                            <tr>
                                <label for="bGroup"><strong>Blood Group : </strong><?php echo $_POST['bGroup']; ?></label><br><br>
                            </tr>
                            <tr>
                                <label for="religion"><strong>Religion : </strong><?php echo $_POST['religion']; ?></label>
                            </tr>
                </table>
            </fieldset>
        </td>
                <td>
                    <fieldset>
                        <legend>Contact Information</legend>
                        <table>
                            <tr>
                                <label><strong>Email: </strong><?php echo $_POST['email']; ?></label><br><br>
                            </tr>
                            <tr>
                                <label><strong>Phone/Mobile: </strong><?php echo $_POST['mNumber']; ?></label><br><br>
                            </tr>
                            <tr>
                                <label><strong>Website: </strong><?php echo $_POST['website']; ?></label><br><br>
                            </tr>
                            <tr>
                                <label><strong>Address: </strong><?php echo $_POST['area'] . ', ' . $_POST['city'] . '-' . $_POST['zip'] . ', ' . $_POST['country']; ?></label><br><br>
                            </tr>
                        </table>
                    </fieldset>
                </td>
                <td>
                    <fieldset>
                        <legend>Account Information</legend>
                        <table>
                        <tr>
                            <label><strong>Username: </strong><?php echo $_POST['username']; ?></label><br><br>
                        </tr>
                        <tr>
                            <label><strong>Password: </strong><?php echo $_POST['password']; ?></label><br><br>
                        </tr>
                        <tr>
                            <label><strong>Confirm Password: </strong><?php echo $_POST['cPassword']; ?></label><br><br>
                        </tr>
                        </table>
                    </fieldset><br>
                </td>
            </table>
    </body>
</html>
