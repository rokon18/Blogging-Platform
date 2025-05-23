<?php include "../controler/textpostaction.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Rich Text Blog Form</title>
  <link rel="stylesheet" href="..//assets/css/texteditor.css" />
  <script src="..//assets/js/texteditorpost.js"></script>
</head>
<body>

  <form method="POST" action="../controler/textpostaction.php" enctype="multipart/form-data" onsubmit="return validateForm();">

  <?php if (!empty($success)) echo "<p style='color:green;'>$success</p>"; ?>

  <label for="title">Post Title *</label>
  <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($title); ?>" required />
  <span style="color:red;"><?php echo $titleErr; ?></span>

  <label for="content">Post Content *</label>
  <textarea id="content" name="content" rows="8" required><?php echo htmlspecialchars($content); ?></textarea>
  <span style="color:red;"><?php echo $contentErr; ?></span>

  <label for="category">Post Category *</label>
  <select id="category" name="category" required>
    <option value="">-- Select --</option>
    <option value="music" <?php if ($category == "music") echo "selected"; ?>>music</option>
    <option value="science" <?php if ($category == "science") echo "selected"; ?>>science</option>
    <option value="sports" <?php if ($category == "sports") echo "selected"; ?>>sports</option>
    <option value="technology" <?php if ($category == "technology") echo "selected"; ?>>technology</option>
    <option value="health" <?php if ($category == "health") echo "selected"; ?>>health</option>
    <option value="entertainment" <?php if ($category == "entertainment") echo "selected"; ?>>entertainment</option>
  </select>
  <span style="color:red;"><?php echo $categoryErr; ?></span>

  <label for="image">Post Image</label>
  <input type="file" id="image" name="image" accept="image/*" />

  <div class="btn-group">
    <button type="submit" name="publish" class="btn-publish">Publish Post</button>
    <button type="submit" name="draft" class="btn-draft">Save Draft</button>
  </div>
</form>

</body>
</html>
