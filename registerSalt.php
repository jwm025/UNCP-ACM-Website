<?php
$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname    = trim($_POST['fname'] ?? '');
    $lname    = trim($_POST['lname'] ?? '');
    $email    = trim($_POST['email'] ?? '');
    $deposit  = trim($_POST['deposit'] ?? '0');
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($fname === '' || $lname === '' || $email === '' || $username === '' || $password === '') {
        $error = "All fields are required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email address.";
    } elseif (strlen($password) < 6) {
        $error = "Password must be at least 6 characters.";
    } else {
        // Connect to database
        $conID = new mysqli("localhost", "root", "", "ACMJustin");
        if ($conID->connect_error) {
            die("Connection failed: " . $conID->connect_error);
        }

        // Check if username is taken
        $stmt = $conID->prepare("SELECT MemberNo FROM memberPW2 WHERE UserName = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $error = "Username is already taken. Choose a different username.";
            $stmt->close();
        } else {
            $stmt->close();

            // Generate salt and hash
            $salt = bin2hex(random_bytes(16));
            $hashed_password = sha1($password . $salt);

            // Insert into memberPW2
            $stmt = $conID->prepare("INSERT INTO memberPW2 (UserName, PassWord, eMail, Salt) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $username, $hashed_password, $email, $salt);

            if ($stmt->execute()) {
                $lastMemberNo = $conID->insert_id;
                $stmt->close();

                // Insert into member2
                $stmt2 = $conID->prepare("INSERT INTO member2 (MemberNo, FirstName, LastName, Deposit) VALUES (?, ?, ?, ?)");
                $stmt2->bind_param("isss", $lastMemberNo, $fname, $lname, $deposit);

                if ($stmt2->execute()) {
                    $stmt2->close();
                    $conID->close();
                    header('Location: loginSalt.html?msg=' . urlencode('Registration successful! Please log in.'));
                    exit;
                } else {
                    $error = "Error creating member record.";
                    $stmt2->close();
                }
            } else {
                $error = "Error creating account.";
                $stmt->close();
            }
        }
        $conID->close();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ACM Registration</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; max-width: 550px; }
        table, tr, td { border: 1px solid #333; border-collapse: collapse; }
        td { padding: 8px 12px; }
        .error { color: red; font-weight: bold; }
        label { font-weight: bold; }
    </style>
</head>
<body>
    <h1>UNCP-ACM Member Registration</h1>

    <?php if ($error): ?>
        <p class="error"><?php echo htmlspecialchars($error); ?></p>
    <?php endif; ?>

    <form method="post" action="registerSalt.php">
        <table>
            <tr>
                <td><label for="fname">First Name:</label></td>
                <td><input type="text" id="fname" name="fname" value="<?php echo htmlspecialchars($_POST['fname'] ?? ''); ?>" required></td>
            </tr>
            <tr>
                <td><label for="lname">Last Name:</label></td>
                <td><input type="text" id="lname" name="lname" value="<?php echo htmlspecialchars($_POST['lname'] ?? ''); ?>" required></td>
            </tr>
            <tr>
                <td><label for="email">Email:</label></td>
                <td><input type="email" id="email" name="email" value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>" required></td>
            </tr>
            <tr>
                <td><label for="username">Username:</label></td>
                <td><input type="text" id="username" name="username" value="<?php echo htmlspecialchars($_POST['username'] ?? ''); ?>" required></td>
            </tr>
            <tr>
                <td><label for="password">Password:</label></td>
                <td><input type="password" id="password" name="password" required minlength="6"></td>
            </tr>
            <tr>
                <td><label for="deposit">Deposit:</label></td>
                <td><input type="text" id="deposit" name="deposit" value="<?php echo htmlspecialchars($_POST['deposit'] ?? '0'); ?>"></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;">
                    <input type="reset" value="Reset">
                    <input type="submit" value="Register">
                </td>
            </tr>
        </table>
    </form>
    <p><a href="index.php">Back to Home</a> | <a href="loginSalt.html">Already have an account? Login</a></p>
</body>
</html>