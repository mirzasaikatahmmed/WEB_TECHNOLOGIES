<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration</title>
</head>
<body>
    <fieldset>
        <legend>Registration</legend>
        <form action="/Registration/register" method="POST" novalidate>
            <label for="fname">First Name: </label>
            <input type="text" id="fname" name="fname" required>
            <br><br>

            <label for="lname">Last Name: </label>
            <input type="text" id="lname" name="lname" required>
            <br><br>

            <label for="gender">Gender: </label>
            <input type="radio" id="male" name="gender" value="Male" required> Male
            <input type="radio" id="female" name="gender" value="Female" required> Female
            <br><br>

            <label for="faName">Father's Name: </label>
            <input type="text" id="faName" name="faName" required>
            <br><br>

            <label for="moName">Mother's Name: </label>
            <input type="text" id="moName" name="moName" required>
            <br><br>

            <label for="bGroup">Blood Group: </label>
            <input type="text" id="bGroup" name="bGroup" required>
            <br><br>

            <label for="religion">Religion: </label>
            <input type="text" id="religion" name="religion" required>
            <br><br>

            <label for="email">Email: </label>
            <input type="email" id="email" name="email" required>
            <br><br>

            <label for="mNumber">Mobile Number: </label>
            <input type="tel" id="mNumber" name="mNumber" required>
            <br><br>

            <label for="website">Website: </label>
            <input type="url" id="website" name="website">
            <br><br>

            <label for="country">Country: </label>
            <input type="text" id="country" name="country" required>
            <br><br>

            <label for="city">City: </label>
            <input type="text" id="city" name="city" required>
            <br><br>

            <label for="pAddress">Permanent Address: </label>
            <textarea id="pAddress" name="pAddress" required></textarea>
            <br><br>

            <label for="zip">ZIP Code: </label>
            <input type="text" id="zip" name="zip" required>
            <br><br>

            <label for="username">Username: </label>
            <input type="text" id="username" name="username" required>
            <br><br>

            <label for="password">Password: </label>
            <input type="password" id="password" name="password" required>
            <br><br>

            <input type="submit" value="Register">
        </form>
    </fieldset>
    <?php echo isset($data['message']) ? $data['message'] : ""; ?>
</body>
</html>
