$(function () {
    let favorite = $(".favorite__toggle");
    let favoriteShopId;
    favorite.on("click", function () {
        let $this = $(this);
        favoriteShopId = $this.data("shop-id");

        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            url: "/favorite",
            method: "POST",
            data: {
                shop_id: favoriteShopId,
            },
        })
            .done(function () {
                $this.toggleClass("liked");
            })
            .fail(function () {
                console.log("fail");
            });
    });
});

function openModal() {
    document.getElementById("guest__modal").style.display = "block";
}

function closeModal() {
    document.getElementById("guest__modal").style.display = "none";
}

window.onload = function () {
    document.querySelector(".close").addEventListener("click", closeModal);

    const buttons = document.querySelectorAll(".modal__open");
    buttons.forEach(function (button) {
        button.addEventListener("click", openModal);
    });
};
