<?php
session_start();
require_once('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT id, password FROM users WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row["password"])) {
            $_SESSION["user_id"] = $row["id"];
            header("main.html"); // 로그인 후 이동할 페이지
        } else {
            echo "잘못된 비밀번호입니다.";
        }
    } else {
        echo "사용자를 찾을 수 없습니다.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>로그인</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
    <h2>Login</h2>
    <form method="POST" action="">
        <label for="username">ID:</label>
        <input type="text" id="username" name="username" required><br>
        <label for="password">PassWord:</label>
        <input type="password" id="password" name="password" required><br>
        <button type="submit">Login</button>
        <a href="signup.php"><p>Create New Account</p></a>
    </form>
</body>
</html>
