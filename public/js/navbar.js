const menuButton = document.getElementById("menu-button");
const mobileMenu = document.getElementById("mobile-menu");
const menuIcon = document.getElementById("menu-icon");

menuButton.addEventListener("click", () => {
    mobileMenu.classList.toggle("hidden");
    if (mobileMenu.classList.contains("hidden")) {
        menuIcon.classList.remove("fa-times");
        menuIcon.classList.add("fa-bars");
    } else {
        menuIcon.classList.remove("fa-bars");
        menuIcon.classList.add("fa-times");
    }
});
