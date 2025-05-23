<?php include "..//controler/newsltraction.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Newsletter Signup</title>
  <link rel="stylesheet" href="..//assets/css/newsltraction.css">
  <script src="..//assets/js/newsltraction.js></script>
</head>
<body>

   <form method="post" action="..//controler/newsltraction.php">

    <table border="0" cellpadding="8" cellspacing="0" align="center">
      <tr>
        <td colspan="2" align="center">
          <h3>Subscribe to Our Newsletter</h3>
        </td>
      </tr>

      <?php if ($success_message): ?>
      <tr>
        <td colspan="2" align="center" style="color: green;">
          <?php echo $success_message; ?>
        </td>
      </tr>
      <?php endif; ?>

      <tr>
        <td>Email Address:</td>
        <td>
          <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($email); ?>" required>
          <br><span style="color:red;"><?php echo $email_error; ?></span>
        </td>
      </tr>

      <tr>
        <td colspan="2">
          <label>
            <input type="checkbox" name="consent" <?php if ($consent) echo "checked"; ?> required>
            I agree to receive emails and accept the
            <a href="/privacy-policy.html" target="_blank">Privacy Policy</a>.
          </label>
          <br><span style="color:red;"><?php echo $consent_error; ?></span>
        </td>
      </tr>

      <tr>
        <td colspan="2" align="center">
          <button type="submit" name="submit">Subscribe</button>
        </td>
      </tr>
    </table>
  </form>

</body>
</html>
