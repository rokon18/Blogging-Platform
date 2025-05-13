function format(command) {
  let selection = window.getSelection();
  if (selection.rangeCount === 0) return;

  let range = selection.getRangeAt(0);
  let selectedText = range.toString();

  if (!selectedText) return;

  let wrapper;
  if (command === "bold") {
    wrapper = document.createElement("strong");
  } else if (command === "h1") {
    wrapper = document.createElement("h1");
  }

  if (wrapper) {
    wrapper.textContent = selectedText;
    range.deleteContents();
    range.insertNode(wrapper);
  }
}

function insertImage() {
  let url = prompt("Enter image URL:");
  if (url) {
    let img = document.createElement("img");
    img.src = url;
    img.alt = "Inserted Image";
    img.style.maxWidth = "100%";
    let editor = document.getElementById("editor");

    let selection = window.getSelection();
    if (selection.rangeCount > 0) {
      let range = selection.getRangeAt(0);
      range.insertNode(img);
    } else {
      editor.appendChild(img);
    }
  }
}

function insertLink() {
  let url = prompt("Enter link URL:");
  if (url) {
    let selection = window.getSelection();
    if (selection.rangeCount === 0) return;

    let range = selection.getRangeAt(0);
    let selectedText = range.toString();

    if (!selectedText) return;

    let a = document.createElement("a");
    a.href = url;
    a.target = "_blank";
    a.textContent = selectedText;
    range.deleteContents();
    range.insertNode(a);
  }
}

function togglePreview() {
  let editor = document.getElementById("editor");
  let preview = document.getElementById("preview");

  if (preview.style.display === "none") {
    preview.innerHTML = editor.innerHTML;
    preview.style.display = "block";
    editor.style.display = "none";
  } else {
    preview.style.display = "none";
    editor.style.display = "block";
  }
}

function dropHandler(event) {
  event.preventDefault();
  let file = event.dataTransfer.files[0];
  if (file && file.type.startsWith("image/")) {
    let reader = new FileReader();
    reader.onload = function (e) {
      let img = document.createElement("img");
      img.src = e.target.result;
      img.style.maxWidth = "100%";
      document.getElementById("editor").appendChild(img);
    };
    reader.readAsDataURL(file);
  }
}

function submitPost() {
  let category = document.getElementById("category").value;
  let content = document.getElementById("editor").innerHTML;

  if (!category) {
    alert("⚠️ Please select a category.");
    return;
  }

  if (!content.trim() || content === "<p>Start writing your post here...</p>") {
    alert("⚠️ Post content cannot be empty.");
    return;
  }

  alert(`✅ Post submitted!\nCategory: ${category}`);
  console.log("Submitted Content:", content);
}
