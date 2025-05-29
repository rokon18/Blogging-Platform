function validateName() {
    let nameInput = document.getElementById('username').value.trim();
    let emailInput = document.getElementById('email').value.trim();
    let passwordInput = document.getElementById('password').value.trim();
    let confirmPasswordInput = document.getElementById('confirm_password').value.trim();
    let msg = document.getElementById('msg');

   
    if (nameInput === "") {
        msg.innerHTML = "Name cannot be empty.";
        msg.style.color = 'red';
        return false;
    }
    if (nameInput.length < 2) {
        msg.innerHTML = "Name must contain at least two characters.";
        msg.style.color = 'red';
        return false;
    }
    if (!isNaN(nameInput[0])) {
        msg.innerHTML = "Name must start with a letter.";
        msg.style.color = 'red';
        return false;
    }
    for (let char of nameInput) {
        if (!(char >= 'a' && char <= 'z') && !(char >= 'A' && char <= 'Z') && char !== '.' && char !== '-' && char !== ' ') {
            msg.innerHTML = "Name can only contain letters, dots (.), dashes (-), and spaces.";
            msg.style.color = 'red';
            return false;
        }
    }

    if (emailInput === "") {
        msg.innerHTML = "Email cannot be empty.";
        msg.style.color = 'red';
        return false;
    }
    if (!emailInput.includes("@") || !emailInput.includes(".")) {
        msg.innerHTML = "Email must contain '@' and '.'";
        msg.style.color = 'red';
        return false;
    }
    if (emailInput.indexOf("@") > emailInput.lastIndexOf(".")) {
        msg.innerHTML = "'@' must appear before '.' in email.";
        msg.style.color = 'red';
        return false;
    }

    if (passwordInput === "") {
        msg.innerHTML = "Password cannot be empty.";
        msg.style.color = 'red';
        return false;
    }
    if (passwordInput.length < 6) {
        msg.innerHTML = "Password must contain at least 6 characters.";
        msg.style.color = 'red';
        return false;
    }

    if (confirmPasswordInput !== passwordInput) {
        msg.innerHTML = "Passwords do not match.";
        msg.style.color = 'red';
        return false;
    }

    msg.innerHTML = ""; 
    return true;
}

document.getElementById('username').addEventListener('input', function() {
    let username = this.value.trim();
    let statusSpan = document.getElementById('username-status');
    if (username.length < 2) {
        statusSpan.textContent = '';
        return;
    }
    let xhr = new XMLHttpRequest();
    xhr.open('POST', '../controler/signupcheck.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            statusSpan.textContent = xhr.responseText;
            if (xhr.responseText === "Username available") {
                statusSpan.style.color = 'green';
            } else {
                statusSpan.style.color = 'red';
            }
        }
    };
    xhr.send('username=' + encodeURIComponent(username));
});
