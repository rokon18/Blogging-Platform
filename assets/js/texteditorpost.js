function validateForm() {
  let isValid = true;

  
  document.querySelectorAll(".error-msg").forEach(el => el.textContent = "");

  let title = document.getElementById("title");
  let content = document.getElementById("content");
  let category = document.getElementById("category");
  let image = document.getElementById("image");

  if (title.value.trim().length < 3) {
    showError(title, "Title must be at least 3 characters.");
    isValid = false;
  }

  
  if (content.value.trim() === "") {
    showError(content, "Post content is required.");
    isValid = false;
  }

  if (category.value === "") {
    showError(category, "Please select a category.");
    isValid = false;
  }

  if (image.files.length > 0) {
     fileType = image.files[0].type;
    let allowedTypes = ["image/jpeg", "image/png", "image/gif"];
    if (!allowedTypes.includes(fileType)) {
      showError(image, "Only JPG, PNG, or GIF files are allowed.");
      isValid = false;
    }
  }

  return isValid; 
}

function showError(inputElement, message) {
  let errorSpan = inputElement.nextElementSibling;
  if (!errorSpan || !errorSpan.classList.contains("error-msg")) {
    errorSpan = document.createElement("span");
    errorSpan.className = "error-msg";
    errorSpan.style.color = "red";
    inputElement.parentNode.insertBefore(errorSpan, inputElement.nextSibling);
  }
  errorSpan.textContent = message;
}
