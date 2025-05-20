function validateName() {

    let emailInput = document.getElementById('email').value.trim();
    let msg = document.getElementById('msg');


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



    msg.innerHTML = ""; 
    return true;
}
