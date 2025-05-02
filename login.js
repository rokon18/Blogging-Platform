function validateName() {
    let nameInput = document.getElementById('username').value.trim();
    let passwordInput = document.getElementById('password').value.trim();
    let msg = document.getElementById('msg');


    if (nameInput === "") {
        msg.innerHTML = "Name cannot be empty.";
        msg.style.color = 'red';
        return false;
    }
    if (nameInput.length < 2) {
        msg.innerHTML = "Name must contain at least two charecter.";
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

    msg.innerHTML = "";
    return true;
}