window.onload = function () {
    const openButtons = document.querySelectorAll(".review__model-btn");
    openButtons.forEach(function (button) {
        button.addEventListener("click", function () {
            const review_star = this.getAttribute("data-star");
            const review_comment = this.getAttribute("data-comment");

            const modal = document.getElementById("review__modal");
            const reviewStarElement = modal.querySelector(".star");

            if (review_star == 1) {
                reviewStarElement.innerHTML = "★";
            } else if (review_star == 2) {
                reviewStarElement.innerHTML = "★ ★";
            } else if (review_star == 3) {
                reviewStarElement.innerHTML = "★ ★ ★";
            } else if (review_star == 4) {
                reviewStarElement.innerHTML = "★ ★ ★ ★";
            } else if (review_star == 5) {
                reviewStarElement.innerHTML = "★ ★ ★ ★ ★";
            } else {
                console.log("error");
            }

            const commentElement = modal.querySelector(".comment");
            commentElement.innerHTML = review_comment;

            modal.style.display = "block";
        });
    });

    const closeButtons = document.querySelectorAll(".modal__close-button");
    closeButtons.forEach(function (button) {
        button.addEventListener("click", function () {
            const modal = button.closest("#review__modal");
            modal.style.display = "none";
        });
    });
};
