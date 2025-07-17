// cart.js

// PERBAIKAN: Pastikan 'cart' dan 'SHIPPING_COST' dideklarasikan di scope global
// dan hanya diinisialisasi sekali.
// Inisialisasi 'cart' dengan nilai dari localStorage *segera* setelah file dimuat.
let cart = []; // Deklarasi awal
const SHIPPING_COST = 9500; // Biaya pengiriman tetap

// PERBAIKAN: Fungsi loadCart() dipanggil lebih awal dan diinisialisasi dari localStorage.
function loadCart() {
    try {
        const storedCart = localStorage.getItem('cart');
        // Pastikan 'cart' diisi dari localStorage atau menjadi array kosong jika tidak ada
        cart = storedCart ? JSON.parse(storedCart) : [];
        console.log("DEBUG: Cart loaded from localStorage:", cart);
    } catch (e) {
        console.error("Error loading cart from localStorage:", e);
        cart = []; // Pastikan cart tetap array kosong jika ada error parsing
    }
}

function saveCart() {
    try {
        localStorage.setItem('cart', JSON.stringify(cart));
        console.log("DEBUG: Cart saved to localStorage:", cart);
    } catch (e) {
        console.error("Error saving cart to localStorage:", e);
    }
}

// PERBAIKAN: Panggil loadCart() segera setelah fungsi-fungsi ini didefinisikan
// Ini memastikan 'cart' selalu terisi saat script cart.js pertama kali dieksekusi,
// sebelum fungsi window.addToCart atau DOMContentLoaded dijalankan.
loadCart();

// PERBAIKAN: Deklarasikan window.addToCart di scope global
// agar dapat diakses oleh script lain segera setelah cart.js dimuat.
window.addToCart = function (item) {
    console.log("DEBUG: window.addToCart called with item:", item);

    // Pada titik ini, 'cart' seharusnya sudah terisi dari loadCart() yang dipanggil di atas.
    // Pengecekan ini mungkin tidak lagi diperlukan jika loadCart() dijamin berjalan duluan.
    // Namun, tidak ada salahnya sebagai fallback.
    if (typeof cart === 'undefined' || !Array.isArray(cart)) {
        console.error("ERROR: 'cart' array is not initialized. Re-attempting loadCart().");
        loadCart(); // Coba muat ulang cart jika ada masalah (fallback)
        if (typeof cart === 'undefined' || !Array.isArray(cart)) {
            console.error("CRITICAL ERROR: 'cart' array still not initialized after attempting to load. Cannot add item.");
            alert("Terjadi kesalahan internal: Keranjang tidak dapat diinisialisasi. Mohon refresh halaman.");
            return;
        }
    }

    const existingItemIndex = cart.findIndex(cartItem => cartItem.id === item.id);
    const quantityToAdd = item.quantity || 1;

    if (existingItemIndex > -1) {
        // Jika item sudah ada, tambahkan kuantitasnya
        cart[existingItemIndex].quantity = (cart[existingItemIndex].quantity || 1) + quantityToAdd;
        // Pastikan 'selected' tetap true jika sebelumnya true, atau set ke true jika ini penambahan
        // (opsional, tergantung logic Anda)
        cart[existingItemIndex].selected = true;
        console.log(`DEBUG: Item "${item.name}" quantity updated in cart.`);
    } else {
        // Jika item belum ada, tambahkan item baru ke keranjang
        cart.push({ ...item, quantity: quantityToAdd, selected: true });
        console.log(`DEBUG: Item "${item.name}" added to cart.`);
    }

    saveCart(); // Simpan keranjang setelah perubahan
    alert(`${item.name} (${quantityToAdd}x) telah ditambahkan ke keranjang!`);

    // Hanya render ulang jika kita berada di halaman keranjang
    const cartProductList = document.getElementById('cart-product-list');
    if (cartProductList) {
        console.log("DEBUG: Rendering cart items on cart page after addToCart.");
        renderCartItems();
    } else {
        console.log("DEBUG: Not on cart page, no re-render needed for cart items.");
    }
};

document.addEventListener('DOMContentLoaded', function () {
    console.log("DEBUG: DOMContentLoaded fired for cart.js.");

    // Dapatkan elemen utama keranjang. Jika ini null, berarti kita tidak di halaman keranjang.
    const cartProductList = document.getElementById('cart-product-list');

    // Hanya jalankan logika keranjang jika elemen cartProductList ada di halaman ini
    if (cartProductList) {
        console.log("DEBUG: Running cart logic. cartProductList found.");

        const selectAllCheckbox = document.getElementById('select-all');
        const removeBtn = document.getElementById('remove-btn');
        const productCountSpan = document.getElementById('product-count');
        const productListSummary = document.getElementById('product-list'); // Bagian ringkasan produk di sisi kanan
        const totalSpan = document.getElementById('total');

        // DEBUGGING: Pastikan semua elemen penting ditemukan
        if (!selectAllCheckbox) console.error("ERROR: selectAllCheckbox (id='select-all') not found!");
        if (!removeBtn) console.error("ERROR: removeBtn (id='remove-btn') not found!");
        if (!productCountSpan) console.error("ERROR: productCountSpan (id='product-count') not found!");
        if (!productListSummary) console.error("ERROR: productListSummary (id='product-list') not found!");
        if (!totalSpan) console.error("ERROR: totalSpan (id='total') not found!");

        // --- Fungsi untuk Merender Item Keranjang ---
        function renderCartItems() {
            console.log("DEBUG: renderCartItems called. Cart length:", cart.length);
            if (!cartProductList) { // Pengecekan tambahan
                console.error("ERROR: cartProductList is null in renderCartItems. Cannot render.");
                return;
            }
            cartProductList.innerHTML = '';

            if (cart.length === 0) {
                cartProductList.innerHTML = '<p>Keranjang Anda kosong.</p>';
                if (removeBtn) removeBtn.classList.add('d-none');
            } else {
                if (removeBtn) removeBtn.classList.remove('d-none'); // Pastikan tombol remove terlihat jika ada item
                cart.forEach((item, index) => {
                    console.log("DEBUG: Rendering item:", item.name, "at index:", index);
                    const productItemDiv = document.createElement('div');
                    productItemDiv.className = 'product-item d-flex justify-content-between align-items-center mb-3';
                    productItemDiv.dataset.index = index;
                    productItemDiv.dataset.price = item.price;
                    productItemDiv.dataset.name = item.name;

                    // Pastikan item.selected adalah boolean, default ke true jika undefined
                    const isChecked = (item.selected === undefined || item.selected === true) ? 'checked' : '';

                    productItemDiv.innerHTML = `
                        <div class="d-flex align-items-center">
                            <input type="checkbox" class="product-checkbox me-2" ${isChecked}>
                            <img src="${item.image}" alt="${item.name}" class="product-img" style="width: 80px; height: 80px; object-fit: cover; border-radius: 8px;"
                                    onerror="this.onerror=null;this.src='https://placehold.co/80x80/E2D2B0/52282A?text=No+Image';">
                            <div class="ms-2">
                                <h6 class="fw-bold mb-0">${item.name}</h6>
                                <small>${item.description || ''}</small>
                                <div class="quantity-controls mt-1">
                                    <button type="button" class="btn btn-sm btn-outline-secondary minus-quantity" data-index="${index}">-</button>
                                    <span class="mx-2">${item.quantity || 1}</span>
                                    <button type="button" class="btn btn-sm btn-outline-secondary plus-quantity" data-index="${index}">+</button>
                                </div>
                            </div>
                        </div>
                        <p class="mb-0 me-3">Rp ${(item.price * (item.quantity || 1)).toLocaleString('id-ID')}</p>
                    `;
                    cartProductList.appendChild(productItemDiv);

                    const checkbox = productItemDiv.querySelector('.product-checkbox');
                    checkbox.addEventListener('change', (event) => {
                        cart[index].selected = event.target.checked;
                        saveCart();
                        updateCartSummary();
                        updateRemoveButtonVisibility();
                    });

                    productItemDiv.querySelector('.minus-quantity').addEventListener('click', () => {
                        if (cart[index].quantity > 1) {
                            cart[index].quantity--;
                            saveCart();
                            renderCartItems();
                        }
                    });
                    productItemDiv.querySelector('.plus-quantity').addEventListener('click', () => {
                        cart[index].quantity = (cart[index].quantity || 1) + 1;
                        saveCart();
                        renderCartItems();
                    });
                });
            }
            updateCartSummary();
            updateRemoveButtonVisibility();
        }

        // --- Fungsi untuk Memperbarui Ringkasan Keranjang ---
        function updateCartSummary() {
            let selectedProductCount = 0;
            let selectedProductsTotal = 0;
            let productListHtml = '';

            cart.forEach(item => {
                if (item.selected) {
                    selectedProductCount += (item.quantity || 1);
                    selectedProductsTotal += (item.price * (item.quantity || 1));
                    productListHtml += `
                        <div class="d-flex justify-content-between">
                            <span>${item.name} x ${item.quantity || 1}</span>
                            <span>Rp ${(item.price * (item.quantity || 1)).toLocaleString('id-ID')}</span>
                        </div>
                    `;
                }
            });

            if (productCountSpan) productCountSpan.textContent = selectedProductCount;
            if (productListSummary) productListSummary.innerHTML = selectedProductCount > 0 ? productListHtml : '<em>Tidak ada produk terpilih</em>';

            const totalAmount = (selectedProductCount > 0 ? SHIPPING_COST : 0) + selectedProductsTotal; // Hanya tambahkan ongkir jika ada produk terpilih
            if (totalSpan) totalSpan.textContent = `Rp ${totalAmount.toLocaleString('id-ID')}`;

            if (selectAllCheckbox) selectAllCheckbox.checked = cart.length > 0 && cart.every(item => item.selected);
        }

        // --- Fungsi untuk Memperbarui Visibilitas Tombol Remove ---

        function updateRemoveButtonVisibility() {
            const anyCheckboxSelected = cart.some(item => item.selected);
            const allCheckboxesSelected = cart.length > 0 && cart.every(item => item.selected); // Tambahkan ini

            if (removeBtn) {
                if (anyCheckboxSelected) {
                    removeBtn.classList.remove('d-none');
                    // PERUBAHAN DI SINI: Atur teks tombol berdasarkan apakah semua item terpilih
                    if (allCheckboxesSelected) {
                        removeBtn.textContent = 'Remove All';
                    } else {
                        removeBtn.textContent = 'Remove';
                    }
                } else {
                    removeBtn.classList.add('d-none');
                    // Opsional: Reset teks jika tidak ada yang terpilih, meskipun tombol tersembunyi
                    removeBtn.textContent = 'Remove';
                }
            }
        }

        // --- Event Listener: Select All ---
        if (selectAllCheckbox) {
            selectAllCheckbox.addEventListener('change', (event) => {
                const isChecked = event.target.checked;
                cart.forEach(item => {
                    item.selected = isChecked;
                });
                saveCart();
                renderCartItems();
            });
        }

        // --- Event Listener: Remove Button ---
        if (removeBtn) {
            removeBtn.addEventListener('click', () => {
                cart = cart.filter(item => !item.selected);
                saveCart();
                renderCartItems();
            });
        }

        // --- Inisialisasi saat DOM siap (hanya jika di halaman keranjang) ---
        // loadCart() sudah dipanggil di awal file, jadi ini hanya memastikan render saat DOM siap
        renderCartItems();
    } // Akhir dari if (cartProductList)
});
