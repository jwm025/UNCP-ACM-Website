<?php
session_start();

// Redirect if not logged in
if (!isset($_SESSION['username']) || !isset($_SESSION['memberno'])) {
    header('Location: loginSalt.html');
    exit;
}

$username = $_SESSION['username'];
$memberno = $_SESSION['memberno'];
$fName = '';
$lName = '';
$deposit = 0;
$email = '';

$conID = new mysqli("localhost", "root", "", "ACMJustin");
if ($conID->connect_error) {
    die("Connection failed: " . $conID->connect_error);
}

// Get member info
$stmt = $conID->prepare("SELECT FirstName, LastName, Deposit FROM member2 WHERE MemberNo = ?");
$stmt->bind_param("i", $memberno);
$stmt->execute();
$result = $stmt->get_result();
if ($row = $result->fetch_assoc()) {
    $fName = $row['FirstName'];
    $lName = $row['LastName'];
    $deposit = $row['Deposit'];
}
$stmt->close();

// Get email
$stmt = $conID->prepare("SELECT eMail FROM memberPW2 WHERE MemberNo = ?");
$stmt->bind_param("i", $memberno);
$stmt->execute();
$result = $stmt->get_result();
if ($row = $result->fetch_assoc()) {
    $email = $row['eMail'];
}
$stmt->close();
$conID->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member Information</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; }
        table {
            width: 60%;
            border-collapse: collapse;
            margin: 25px 0;
            font-size: 16px;
        }
        th, td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }
        th { background-color: #f2f2f2; }
        .actions a {
            margin-right: 15px;
            text-decoration: none;
            color: #0066cc;
        }
    </style>
</head>
<body>
    <h1>Welcome, <?php echo htmlspecialchars($username); ?>!</h1>
    <h2>Member Information</h2>
    <table>
        <tr>
            <th>Member Number</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Deposit</th>
        </tr>
        <tr>
            <td><?php echo htmlspecialchars($memberno); ?></td>
            <td><?php echo htmlspecialchars($fName); ?></td>
            <td><?php echo htmlspecialchars($lName); ?></td>
            <td><?php echo htmlspecialchars($email); ?></td>
            <td><?php echo htmlspecialchars($deposit); ?></td>
        </tr>
    </table>

    <div class="actions">
        <a href="index.php">Home</a>
        <a href="logout.php">Logout</a>
    </div>
</body>
</html>