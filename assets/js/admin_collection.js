function validateUniqueTitle() {
    let input = document.getElementById('collectionTitle').value.trim().toLowerCase();
    let titles = document.getElementsByClassName('collection-title');
    let msg = document.getElementById('jsError');
    let isUnique = true;

    for (let i = 0; i < titles.length; i++) {
        if (titles[i].textContent.trim().toLowerCase() === input) {
            isUnique = false;
            break;
        }
    }

    if (!isUnique) {
        if (!msg) {
            msg = document.createElement('div');
            msg.id = 'jsError';
            msg.className = 'error';
            let form = document.getElementById('collectionForm');
            form.parentNode.insertBefore(msg, form);
        }
        msg.innerHTML = "Collection title must be unique.";
        return false;
    } else if (msg) {
        msg.innerHTML = "";
    }
    return true;
}

document.getElementById('collectionForm').onsubmit = validateUniqueTitle;