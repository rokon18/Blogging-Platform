<?php
$success = $name = $email = $subject = $message = "";
$nameErr = $emailErr = $subjectErr = $messageErr = "";

include "../controler/contactUs.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Contact Us</title>
  <link rel="stylesheet" href="../assets/css/Contact.css">
  <script src="../assets/js/contactUs.js" ></script>
</head>
<body>
  <div class="contact-container" id="form-container">
    <i class="fas fa-arrow-left back-icon"></i>
    <h2>Contact Us</h2>
    <?php if ($success) { echo '<div class="success">' . $success . '</div>'; } ?>
    <form method="POST" action="../controller/contactUs.php" enctype="multipart/form-data" onsubmit="return validateContactForm();">
      <div class="input-group">
        <input type="text" name="name" placeholder="Full Name" value="<?php echo htmlspecialchars($name); ?>">
        <span class="error"><?php echo $nameErr; ?></span>
      </div>
      <div class="input-group">
        <input type="email" name="email" placeholder="Email Address" value="<?php echo htmlspecialchars($email); ?>">
        <span class="error"><?php echo $emailErr; ?></span>
      </div>
      <div class="input-group">
        <input type="text" name="subject" placeholder="Subject" value="<?php echo htmlspecialchars($subject); ?>">
        <span class="error"><?php echo $subjectErr; ?></span>
      </div>
      <div class="input-group">
        <textarea name="message" rows="5" placeholder="Your Message"><?php echo htmlspecialchars($message); ?></textarea>
        <span class="error"><?php echo $messageErr; ?></span>
      </div>
      <button type="submit" class="submit-btn">Submit</button>
    </form>
  </div>
</body>
</html>