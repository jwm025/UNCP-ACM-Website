<?php
session_start();

$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    $username = trim($_POST['uName'] ?? '');
    $password = $_POST['pw'] ?? '';

    if ($username === '' || $password === '') {
        $error = "Username and password are required.";
    } else {
        $conID = new mysqli("localhost", "root", "", "ACMJustin");
        if ($conID->connect_error) {
            die("Connection failed: " . $conID->connect_error);
        }

        $stmt = $conID->prepare("SELECT MemberNo, PassWord, Salt FROM memberPW2 WHERE UserName = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        if ($row && $row['PassWord'] === sha1($password . $row['Salt'])) {
            // Login successful
            session_regenerate_id(true);
            $_SESSION['username'] = $username;
            $_SESSION['memberno'] = $row['MemberNo'];
            $stmt->close();
            $conID->close();
            header('Location: memberInfoSalt.php');
            exit;
        } else {
            $error = "Username or password is incorrect. Please try again.";
        }

        $stmt->close();
        $conID->close();
    }
}

if ($error) {
    header('Location: loginSalt.html?error=' . urlencode($error));
    exit;
}

header('Location: loginSalt.html');
exit;
?>