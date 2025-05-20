function toggleMenu() {
    let menu = document.getElementById("profileMenu");
    menu.style.display = (menu.style.display === "block") ? "none" : "block";
}


document.addEventListener("click", function(event) {
    let menu = document.getElementById("profileMenu");
    if (!event.target.closest(".profile")) {
        menu.style.display = "none";
    }
});