window.addEventListener("load", function () {
    var openButtons = document.querySelectorAll(".modal__open-button");
    openButtons.forEach(function (button) {
        button.addEventListener("click", function () {
            var reserveId = this.dataset.reserveId;
            var url = this.getAttribute("data-url");
            var reservesData = JSON.parse(this.dataset.reserves);
            var reserve = reservesData.find(function (element) {
                return element.id == reserveId;
            });

            document.getElementById("update__form").setAttribute("action", url);

            var modal = document.getElementById("reserve-modal");
            var shopNameElement = modal.querySelector("#modal-shop-name");
            shopNameElement.textContent = reserve.shop.name;

            var reserveDateInput = modal.querySelector("#modal-reserve-date");
            reserveDateInput.value = reserve.date;

            var selectTimeElement = modal.querySelector("#modal-reserve-time");
            for (var i = 0; i < selectTimeElement.options.length; i++) {
                if (selectTimeElement.options[i].value === reserve.time) {
                    selectTimeElement.selectedIndex = i;
                    break;
                }
            }

            var selectNumberElement = modal.querySelector(
                "#modal-reserve-number"
            );
            for (var i = 0; i < selectNumberElement.options.length; i++) {
                if (selectNumberElement.options[i].value === reserve.number) {
                    selectNumberElement.selectedIndex = i;
                    break;
                }
            }

            modal.style.display = "block";
        });
    });

    var closeButtons = document.querySelectorAll(".modal__close-button");
    closeButtons.forEach(function (button) {
        button.addEventListener("click", function () {
            var modal = button.closest(".modal");
            modal.style.display = "none";
        });
    });
});




window.addEventListener("load", function () {
    var openButtons = document.querySelectorAll("#delete__modal-button");
    openButtons.forEach(function (button) {
        button.addEventListener("click", function () {
            var url = this.getAttribute("data-url");
            document.getElementById("delete__link").setAttribute("action", url);

            var modal = document.getElementById("delete__modal");

            modal.style.display = "block";
        });
    });


    var closeButtons = document.querySelectorAll(".close-btn");
    closeButtons.forEach(function (button) {
        button.addEventListener("click", function () {
            var modal = button.closest("#delete__modal");
            modal.style.display = "none";
        });
    });
});

