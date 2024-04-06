const scrollToTopBtn = document.querySelector(".scroll-to-top");
scrollToTopBtn.addEventListener("click", () => {
    window.scrollTo({
        top: 0,
        behavior: "smooth",
    });
});