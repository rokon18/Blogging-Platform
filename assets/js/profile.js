function validateForm() {
            let nameInput = document.getElementById('username').value.trim();
            let emailInput = document.getElementById('email').value.trim();
            let oldPasswordInput = document.getElementById('old-password').value.trim();
            let newPasswordInput = document.getElementById('new-password').value.trim();
            let confirmPasswordInput = document.getElementById('confirm-password').value.trim();
            let msg = document.getElementById('msg');

            
            if (nameInput.length > 0) {
                if (nameInput.length < 2) {
                    msg.innerHTML = "Username must contain at least two characters.";
                    return false;
                }
                if (!isNaN(nameInput[0])) {
                    msg.innerHTML = "Username must start with a letter.";
                    return false;
                }
                for (let char of nameInput) {
                    if (!(char >= 'a' && char <= 'z') && !(char >= 'A' && char <= 'Z') && char !== '.' && char !== '-' && char !== ' ') {
                        msg.innerHTML = "Username can only contain letters, dots (.), dashes (-), and spaces.";
                        return false;
                    }
                }
            }

           
            if (emailInput.length > 0) {
                if (!emailInput.includes('@') || !emailInput.includes('.')) {
                    msg.innerHTML = "Please enter a valid email address.";
                    return false;
                }
            }

           
            if (newPasswordInput.length > 0) {
                if (newPasswordInput.length < 6) {
                    msg.innerHTML = "New password must contain at least 6 characters.";
                    return false;
                }
                if (confirmPasswordInput !== newPasswordInput) {
                    msg.innerHTML = "Passwords do not match.";
                    return false;
                }
                if (oldPasswordInput.length === 0) {
                    msg.innerHTML = "Please enter your old password to change password.";
                    return false;
                }
            }

            msg.innerHTML = "";
            return true;
        }
