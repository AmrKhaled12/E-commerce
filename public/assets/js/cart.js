// Function to update the total price based on quantities
function updateCart() {
    let totalPrice = 0;

    // Get all the cart items
    const cartItems = document.querySelectorAll('.cart-item');
    cartItems.forEach(item => {
        const price = parseFloat(item.querySelector('.price').textContent.replace('$', ''));
        const quantity = item.querySelector('.quantity').value;
        const total = price * quantity;
        
        item.querySelector('.total').textContent = '$' + total.toFixed(2);
        totalPrice += total;
    });

    // Update the total price in the cart summary
    document.getElementById('total-price').textContent = 'Total: $' + totalPrice.toFixed(2);
}

// Function to remove an item from the cart
function removeItem(button) {
    const row = button.closest('.cart-item');
    row.remove();
    updateCart(); // Update the cart after removal
}

// Initialize the cart when the page loads
document.addEventListener('DOMContentLoaded', () => {
    updateCart();
});
