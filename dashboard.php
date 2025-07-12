<?php
session_start();
if (!isset($_SESSION["logged_in"])) {
    header("Location: login.php");
    exit;
}
$data = json_decode(file_get_contents("data/channels.json"), true);
$sections = array_keys($data);
?>
<!DOCTYPE html>
<html lang="ar">
<head>
  <meta charset="UTF-8">
  <title>لوحة تحكم القنوات</title>
</head>
<body>
  <h1>لوحة تحكم القنوات</h1>
  <a href="logout.php">تسجيل الخروج</a>
  <form action="save.php" method="POST">
<?php foreach ($data as $section => $channels): ?>
    <h2><?php echo $section; ?></h2>
    <table border="1">
      <tr><th>اسم القناة</th><th>الرابط (Base64)</th></tr>
      <?php foreach ($channels as $name => $link): ?>
        <tr>
          <td><?php echo $name; ?></td>
          <td><input type="text" name="<?php echo $section . '||' . $name; ?>" value="<?php echo htmlspecialchars($link); ?>" size="80"></td>
        </tr>
      <?php endforeach; ?>
    </table>
<?php endforeach; ?>
    <br><input type="submit" value="حفظ التغييرات">
  </form>
</body>
</html>