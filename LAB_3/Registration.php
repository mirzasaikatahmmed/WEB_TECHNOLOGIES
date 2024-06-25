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
                        <td><strong>First Name: </strong><?php echo $_POST['fname']; ?></td><br><br>
                    </tr>
                    <tr>
                        <td><strong>Last Name: </strong><?php echo $_POST['lname']; ?></td><br><br>
                    </tr>
                    <tr>
                        <td><strong>Gender: </strong><?php echo $_POST['gender']; ?></td><br><br>                               
                    </tr>
                    <tr>
                        <td><strong>Father's Name: </strong><?php echo $_POST['faName']; ?></td>
                        <td><input type="file"></td><br><br>
                    </tr>
                    <tr>
                        <td><strong>Mother's Name: </strong><?php echo $_POST['moName']; ?></td><br><br>
                    </tr>
                    <tr>
                        <td><strong>Blood Group: </strong><?php echo $_POST['bGroup']; ?></td><br><br>
                    </tr>
                   <tr>
                       <td><strong>Religion: </strong><?php echo $_POST['religion']; ?></td><br><br>
                    </tr>
                </table>
            </fieldset>
        </td>
                <td>
                    <fieldset>
                        <legend>Contact Information</legend>
                        <table>
                            <tr>
                                <td><strong>Email: </strong><?php echo $_POST['email']; ?></td><br><br>
                            </tr>
                            <tr>
                                <td><strong>Phone/Mobile: </strong><?php echo $_POST['mNumber']; ?></td><br><br>
                            </tr>
                            <tr>
                                <td><strong>Website: </strong><?php echo $_POST['website']; ?></td><br><br>
                            </tr>
                            <tr>
                                <td><strong>Address: </strong><?php echo $_POST['country'] . $_POST['zip']; ?></td><br><br>
                            </tr>
                        </table>
                    </fieldset>
                </td>
                <td>
                    <fieldset>
                        <legend>Account Information</legend>
                        <table>
                        <tr>
                            <td><strong>Username: </strong><?php echo $_POST['username']; ?></td><br><br>
                        </tr>
                        <tr>
                            <td><strong>Password: </strong><?php echo $_POST['password']; ?></td><br><br>
                        </tr>
                        <tr>
                            <td><strong>Confirm Password: </strong><?php echo $_POST['cPassword']; ?></td><br><br>
                        </tr>
                        </table>
                    </fieldset><br>
                </td>
            </table>
    </body>
</html>