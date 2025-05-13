function uploadPhoto() {
  let input = document.getElementById("photoInput");
  let file = input.files[0];
  let reader = new FileReader();

  reader.onload = function (e) {
    let photo = document.getElementById("bioPhoto");
    photo.src = e.target.result;
  };

  if (file) {
    reader.readAsDataURL(file);
  }
}

function saveAbout() {
  let aboutText = document.getElementById("aboutInput").value;
  let display = document.getElementById("aboutDisplay");
  display.textContent = aboutText;
}

function addSocialLinks() {
  let fb = document.getElementById("facebook").value;
  let tw = document.getElementById("twitter").value;
  let container = document.getElementById("socialContainer");

  container.innerHTML = ""; // Clear previous links

  if (fb !== "") {
    let fbLink = document.createElement("a");
    fbLink.href = fb;
    fbLink.target = "_blank";
    fbLink.textContent = "Facebook";
    container.appendChild(fbLink);
  }

  if (tw !== "") {
    let twLink = document.createElement("a");
    twLink.href = tw;
    twLink.target = "_blank";
    twLink.textContent = "Twitter";
    container.appendChild(twLink);
  }
}

function toggleBadge() {
  let check = document.getElementById("verifiedCheck");
  let badge = document.getElementById("verifiedBadge");
  badge.style.display = check.checked ? "inline" : "none";
}

function viewPosts() {
  let profileContainer = document.getElementById("profileContainer");
  let postsList = document.getElementById("postsList");

  profileContainer.style.display = "none"; // Hide the profile
  postsList.style.display = "block"; // Show the posts
}

function viewProfile() {
  let profileContainer = document.getElementById("profileContainer");
  let postsList = document.getElementById("postsList");

  profileContainer.style.display = "block"; // Show the profile
  postsList.style.display = "none"; // Hide the posts
}
