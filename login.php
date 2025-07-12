<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST["username"] == "admin" && $_POST["password"] == "1234") {
        $_SESSION["logged_in"] = true;
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "بيانات الدخول غير صحيحة";
    }
}
?>
<!DOCTYPE html>
<html lang="ar">
<head>
  <meta charset="UTF-8">
  <title>تسجيل الدخول</title>
</head>
<body>
  <h2>تسجيل الدخول</h2>
  <?php if (!empty($error)) echo "<p>$error</p>"; ?>
  <form method="POST">
    اسم المستخدم: <input type="text" name="username"><br>
    كلمة المرور: <input type="password" name="password"><br>
    <input type="submit" value="دخول">
  </form>
</body>
</html>