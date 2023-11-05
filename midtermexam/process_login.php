<!DOCTYPE html>
<html>
<head>
<title>User Login</title>
</head>
<body>
<h1>User Login</h1>
<form method="post" action="process_login.php">
<label for="email">Email:</label>
<input type="text" name="email" id="email" required><br>


<label for="password">Password:</label>
<input type="text" name="password" id="password" required><br>


<input type="submit" value="Login">
</form>
</body>
</html>


<?php
$givenEmail = "uc@gmail.com";
$givenPassword = "ucban123";


#regex to compare and validate given email
#email with small/capital letters, nubmers, hyphen and underscore, this case just small case letters.
$validEmail = "([a-zA-Z0-9\-_]*)@([a-z]).([a-z])";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$submittedEmail = $_POST["email"];
$submittedPassword = $_POST["password"];


#pregmatch to compare valid email pattern to the submitted email
if (preg_match("/$validEmail/", $submittedEmail)) {
if ($submittedEmail === $givenEmail && $submittedPassword === $givenPassword) {
echo "Login Success";
} else {
echo "Error Login.";
}
} else {
echo "Invalid Email.";
}
} else {
echo "Please submit the form to log in.";
}
?>