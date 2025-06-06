function formatRupiah(angka) {
    return "Rp" + angka.toLocaleString("id-ID");
}

function toggleButton() {
    const checkboxes = document.querySelectorAll(".item-checkbox");
    const checkoutBtn = document.getElementById("checkout-btn-container");
    let isAnyChecked = Array.from(checkboxes).some((cb) => cb.checked);
    checkoutBtn.style.display = isAnyChecked ? "block" : "none";
    calculateTotal();
}

function increaseQuantity(button) {
    const quantityElement = button.parentElement.querySelector(".quantity");
    let quantity = parseInt(quantityElement.textContent);
    quantityElement.textContent = quantity + 1;
    updateItemTotal(button);
    calculateTotal();
}

function decreaseQuantity(button) {
    const quantityElement = button.parentElement.querySelector(".quantity");
    let quantity = parseInt(quantityElement.textContent);
    if (quantity > 1) {
        quantityElement.textContent = quantity - 1;
        updateItemTotal(button);
        calculateTotal();
    }
}

function updateItemTotal(button) {
    const cartItem = button.closest(".cart-item");
    const hargaSatuan = parseInt(
        cartItem
            .querySelector("[data-harga-satuan]")
            .getAttribute("data-harga-satuan")
    );
    const quantity = parseInt(cartItem.querySelector(".quantity").textContent);
    const totalHargaItem = cartItem.querySelector(".total-harga-item");
    totalHargaItem.textContent = formatRupiah(hargaSatuan * quantity);
}

function calculateTotal() {
    let subtotal = 0;
    const items = document.querySelectorAll(".cart-item");
    items.forEach((item) => {
        const checkbox = item.querySelector(".item-checkbox");
        if (checkbox.checked) {
            const hargaSatuan = parseInt(
                item
                    .querySelector("[data-harga-satuan]")
                    .getAttribute("data-harga-satuan")
            );
            const quantity = parseInt(
                item.querySelector(".quantity").textContent
            );
            subtotal += hargaSatuan * quantity;
        }
    });
    const deliveryFee = subtotal > 0 ? 10000 : 0;
    const total = subtotal + deliveryFee;
    document.getElementById("subtotal").textContent = formatRupiah(subtotal);
    document.getElementById("delivery-fee").textContent =
        formatRupiah(deliveryFee);
    document.getElementById("total").textContent = formatRupiah(total);
}

// Inisialisasi saat halaman dimuat
document.addEventListener("DOMContentLoaded", function () {
    calculateTotal();
    // Pastikan tombol checkout hidden jika tidak ada item tercentang
    toggleButton();
});
