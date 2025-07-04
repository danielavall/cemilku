document.addEventListener("DOMContentLoaded", function () {
    const minusBtn = document.getElementById("minus");
    const plusBtn = document.getElementById("plus");
    const valueInput = document.getElementById("value");
    const stock = parseInt(document.getElementById("stock").value);

    const alertBox = document.getElementById("alertBox");
    const alertMessage = document.getElementById("alertMessage");
    const toast = document.getElementById("toastAlert");
    const toastMessage = document.getElementById("toastMessage");

    let alertTimeout;

    const form = document.querySelector("form");

    form.addEventListener("submit", function (e) {
        let currentValue = parseInt(valueInput.value);

        if (isNaN(currentValue) || currentValue < 1) {
            e.preventDefault();
            showAlert("Minimum quantity is 1!");
            valueInput.value = 1;
            return;
        }

        if (currentValue > stock) {
            e.preventDefault();
            showAlert("Oops! Maximum stock limit reached.");
            valueInput.value = stock;
            return;
        }
    });

    function isMobileView() {
        return window.matchMedia("(max-width: 430px)").matches;
    }

    function showToast(message) {
        toastMessage.textContent = message;
        toast.classList.add("show");

        clearTimeout(alertTimeout);
        alertTimeout = setTimeout(() => {
            toast.classList.remove("show");
        }, 3000);
    }

    function showAlert(message) {
        if (isMobileView()) {
            showToast(message);
        } else {
            alertMessage.textContent = message;
            alertBox.classList.add("active");

            clearTimeout(alertTimeout);
        }
    }

    minusBtn.onclick = function () {
        let value = parseInt(valueInput.value);
        if (isNaN(value)) value = 1;

        if (value > 1) value--;
        valueInput.value = value;
    };

    plusBtn.onclick = function () {
        let value = parseInt(valueInput.value);
        if (isNaN(value)) value = 1;

        if (value < stock) {
            value++;
            valueInput.value = value;
        } else {
            showAlert("Oops! Maximum stock limit reached.");
            valueInput.value = stock;
        }
    };

    valueInput.addEventListener("input", function () {
        let value = parseInt(valueInput.value);

        if (isNaN(value) || value < 1) {
            return;
        } else if (value > stock) {
            showAlert("Oops! Maximum stock limit reached.");
            valueInput.value = stock;
        }
    });

    valueInput.addEventListener("blur", function () {
        if (valueInput.value === "") {
            valueInput.value = 1;
        }
    });

    valueInput.addEventListener("keydown", function (e) {
        if (e.key === "Enter") {
            e.preventDefault();
        }
    });
});
