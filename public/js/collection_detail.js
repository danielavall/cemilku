// document.addEventListener("DOMContentLoaded", function () {
//     const minusBtn = document.getElementById("minus");
//     const plusBtn = document.getElementById("plus");
//     const valueInput = document.getElementById("value");
//     const stock = parseInt(document.getElementById("stock").value);

//     const alertBox = document.getElementById("alertBox");
//     const alertMessage = document.getElementById("alertMessage");
//     const toast = document.getElementById("toastAlert");
//     const toastMessage = document.getElementById("toastMessage");

//     let alertTimeout;

//     const form = document.querySelector("form");

//     form.addEventListener("submit", function (e) {
//         let currentValue = parseInt(valueInput.value);

//         if (isNaN(currentValue) || currentValue < 1) {
//             e.preventDefault();
//             showAlert("Minimum quantity is 1!");
//             valueInput.value = 1;
//             return;
//         }

//         if (currentValue > stock) {
//             e.preventDefault();
//             showAlert("Oops! Maximum stock limit reached.");
//             valueInput.value = stock;
//             return;
//         }
//     });

//     function isMobileView() {
//         return window.matchMedia("(max-width: 430px)").matches;
//     }

//     function showToast(message) {
//         toastMessage.textContent = message;
//         toast.classList.add("show");

//         clearTimeout(alertTimeout);
//         alertTimeout = setTimeout(() => {
//             toast.classList.remove("show");
//         }, 3000);
//     }

//     function showAlert(message) {
//         if (isMobileView()) {
//             showToast(message);
//         } else {
//             alertMessage.textContent = message;
//             alertBox.classList.add("active");

//             clearTimeout(alertTimeout);
//         }
//     }

//     minusBtn.onclick = function () {
//         let value = parseInt(valueInput.value);
//         if (isNaN(value)) value = 1;

//         if (value > 1) value--;
//         valueInput.value = value;
//     };

//     plusBtn.onclick = function () {
//         let value = parseInt(valueInput.value);
//         if (isNaN(value)) value = 1;

//         if (value < stock) {
//             value++;
//             valueInput.value = value;
//         } else {
//             showAlert("Oops! Maximum stock limit reached.");
//             valueInput.value = stock;
//         }
//     };

//     valueInput.addEventListener("input", function () {
//         let value = parseInt(valueInput.value);

//         if (isNaN(value) || value < 1) {
//             return;
//         } else if (value > stock) {
//             showAlert("Oops! Maximum stock limit reached.");
//             valueInput.value = stock;
//         }
//     });

//     valueInput.addEventListener("blur", function () {
//         if (valueInput.value === "") {
//             valueInput.value = 1;
//         }
//     });

//     valueInput.addEventListener("keydown", function (e) {
//         if (e.key === "Enter") {
//             e.preventDefault();
//         }
//     });
// });
// Tambahkan flag global untuk memastikan script hanya diinisialisasi sekali
// Tambahkan flag global untuk memastikan script hanya diinisialisasi sekali
if (window.collectionDetailJsInitialized) {
    console.log("DEBUG: collection_detail.js already initialized. Skipping re-initialization.");
} else {
    window.collectionDetailJsInitialized = true;
    console.log("DEBUG: collection_detail.js loaded and initializing for the first time.");

    document.addEventListener("DOMContentLoaded", function () {
        console.log("DEBUG: DOMContentLoaded fired for collection_detail.js.");

        const minusBtn = document.getElementById("minus");
        const plusBtn = document.getElementById("plus");
        const valueInput = document.getElementById("value");
        const stockInput = document.getElementById("stock");
        const stock = stockInput ? parseInt(stockInput.value) : 9999;

        const alertBox = document.getElementById("alertBox");
        const alertMessage = document.getElementById("alertMessage");
        const toast = document.getElementById("toastAlert");
        const toastMessage = document.getElementById("toastMessage");

        let alertTimeout;

        const form = document.querySelector("form#add-to-cart-form");
        const addToCartDetailBtn = document.getElementById("add-to-cart-detail-btn");

        console.log("DEBUG: Form element found:", !!form);
        console.log("DEBUG: AddToCart button found:", !!addToCartDetailBtn);
        console.log("DEBUG: Value input found:", !!valueInput);
        console.log("DEBUG: Stock input found:", !!stockInput, "Stock value:", stock);

        // PERUBAHAN UTAMA: Pasang event listener 'click' langsung pada tombol
        // dan pindahkan logika submit form ke sini.
        if (addToCartDetailBtn) {
            addToCartDetailBtn.addEventListener("click", function (e) {
                e.preventDefault(); // Mencegah perilaku default (jika type="button" ini tidak terlalu penting, tapi baik untuk kebiasaan)
                console.log("DEBUG: AddToCart button received a click event!"); // Log ini harus muncul saat diklik

                let currentValue = parseInt(valueInput.value);

                if (isNaN(currentValue) || currentValue < 1) {
                    showAlert("Minimum quantity is 1!");
                    valueInput.value = 1;
                    return;
                }

                if (currentValue > stock) {
                    showAlert("Oops! Maximum stock limit reached.");
                    valueInput.value = stock;
                    return;
                }

                const itemId = document.getElementById('item-id').value;
                const itemName = document.getElementById('item-name').value;
                const itemPrice = parseInt(document.getElementById('item-price').value);
                const itemImage = document.getElementById('item-image').value;
                const itemDescription = document.getElementById('item-description').value;

                const itemToAdd = {
                    id: itemId,
                    name: itemName,
                    price: itemPrice,
                    image: itemImage,
                    description: itemDescription,
                    quantity: currentValue
                };

                console.log("DEBUG: Item to add to cart:", itemToAdd);

                if (window.addToCart) {
                    window.addToCart(itemToAdd);

                    const doneModalElement = document.getElementById('doneModal');
                    if (doneModalElement) {
                        var doneModal = new bootstrap.Modal(doneModalElement);
                        doneModal.show();
                    } else {
                        console.error("DEBUG: Modal 'doneModal' not found.");
                    }
                } else {
                    console.error("Error: window.addToCart function not found. Make sure cart.js is loaded correctly.");
                    alert("Gagal menambahkan ke keranjang. Fungsi keranjang tidak tersedia.");
                }
            });
        } else {
            console.error("ERROR: AddToCart button with ID 'add-to-cart-detail-btn' not found!");
        }

        // PERUBAHAN: Hapus event listener submit form yang lama
        // if (form) {
        //     form.addEventListener("submit", function (e) {
        //         e.preventDefault();
        //         console.log("DEBUG: Form submit event fired for Add to Cart!");
        //         // Logika di sini dipindahkan ke event listener click tombol
        //     });
        // } else {
        //     console.error("ERROR: Form with ID 'add-to-cart-form' not found!");
        // }

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
                alertTimeout = setTimeout(() => {
                    alertBox.classList.remove("active");
                    alertBox.style.display = 'none';
                }, 5000);
            }
        }

        if (valueInput && stockInput) {
            let currentQuantity = parseInt(valueInput.value);

            function updateQuantityDisplay() {
                valueInput.value = currentQuantity;
                if (currentQuantity > stock) {
                    showAlert(`Oops! Stok hanya tersedia ${stock}.`);
                    valueInput.value = stock;
                    currentQuantity = stock;
                } else if (currentQuantity < 1) {
                    showAlert("Kuantitas minimal adalah 1!");
                    valueInput.value = 1;
                    currentQuantity = 1;
                } else {
                    alertBox.classList.remove("active");
                    alertBox.style.display = 'none';
                }
            }

            if (minusBtn) {
                minusBtn.onclick = function () {
                    if (currentQuantity > 1) {
                        currentQuantity--;
                        updateQuantityDisplay();
                    } else {
                        showAlert("Kuantitas minimal adalah 1!");
                    }
                };
            }

            if (plusBtn) {
                plusBtn.onclick = function () {
                    if (currentQuantity < stock) {
                        currentQuantity++;
                        updateQuantityDisplay();
                    } else {
                        showAlert(`Oops! Stok hanya tersedia ${stock}.`);
                    }
                };
            }

            valueInput.addEventListener("input", function () {
                let value = parseInt(valueInput.value);
                if (isNaN(value) || value < 1) {
                    currentQuantity = 1;
                } else if (value > stock) {
                    currentQuantity = stock;
                } else {
                    currentQuantity = value;
                }
                updateQuantityDisplay();
            });

            valueInput.addEventListener("blur", function () {
                if (valueInput.value === "" || isNaN(parseInt(valueInput.value)) || parseInt(valueInput.value) < 1) {
                    valueInput.value = 1;
                    currentQuantity = 1;
                    updateQuantityDisplay();
                }
            });

            valueInput.addEventListener("keydown", function (e) {
                if (e.key === "Enter") {
                    e.preventDefault();
                    // PERUBAHAN: Jika Enter ditekan, panggil klik tombol Add To Cart secara manual
                    if (addToCartDetailBtn) { // Memastikan tombol ada
                        addToCartDetailBtn.click(); // Memicu event click pada tombol
                    }
                }
            });

            updateQuantityDisplay();
        } else {
            console.error("ERROR: Quantity counter elements (valueInput, stockInput) not found!");
        }
    });
}
