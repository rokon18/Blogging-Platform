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

  <form id="textPostForm" enctype="multipart/form-data">

  <?php if (!empty($success)) echo "<p style='color:green;'>$success</p>"; ?>

  <label for="title">Post Title *</label>
  <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($title); ?>" required />
  <span style="color:red;"><?php echo $titleErr; ?></span>

  <label for="content">Post Content *</label>
  <textarea id="content" name="content" rows="8" required><?php echo htmlspecialchars($content); ?></textarea>
  <span style="color:red;"><?php echo $contentErr; ?></span>

  <label for="description">Post Description *</label>
  <textarea id="description" name="description" rows="8" required><?php echo htmlspecialchars($content); ?></textarea>
  <span style="color:red;"><?php echo $descriptionErr; ?></span>


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

<script>
document.getElementById('textPostForm').addEventListener('submit', function(e) {
  e.preventDefault();
  var form = document.getElementById('textPostForm');
  var title = form.title.value.trim();
  var content = form.content.value.trim();
  var description = form.description.value.trim();
  var category = form.category.value;
  var imageInput = form.image;

  if (!title || !content || !description || !category) {
    alert('Please fill in all required fields.');
    return;
  }

  var formData = new FormData();
  formData.append('title', title);
  formData.append('content', content);
  formData.append('description', description);
  formData.append('category', category);
  if (imageInput && imageInput.files.length > 0) {
    formData.append('image', imageInput.files[0]);
  }

  var xhr = new XMLHttpRequest();
  xhr.open('POST', '../controler/textpostaction.php', true);
  xhr.onreadystatechange = function() {
    if (xhr.readyState === 4) {
      if (xhr.status === 200) {
        var response = xhr.responseText;
        if (response.includes('✅ Post submitted successfully!')) {
          alert('Post submitted successfully!');
          form.reset();
        } else {
          alert('Failed to submit post. Please try again.');
        }
      } else {
        alert('Failed to submit post. Please try again.');
      }
    }
  };
  xhr.send(formData);
});
</script>

</body>
</html>
