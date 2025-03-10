<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arugambay Airport Taxi</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .booking-form {
            max-width: 350px;
            margin: 20px auto;
            padding: 15px;
            background: #f8f8f8;
            border-radius: 8px;
            box-shadow: 0 0 8px rgba(0, 0, 0, 0.1);
        }
        .form-group {
            display: flex;
            gap: 30px;
        }
        .form-group div {
            flex: 1;
        }
        .booking-form h3 {
            text-align: center;
            margin-bottom: 10px;
            font-size: 1.2em;
        }
        .booking-form label {
            font-weight: bold;
            display: block;
            font-size: 0.9em;
            margin-top: 8px;
        }
        .booking-form input {
            width: 100%;
            padding: 6px;
            margin-top: 3px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 0.9em;
        }
        .booking-form button {
            width: 100%;
            padding: 8px;
            margin-top: 12px;
            background: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1em;
        }
        .booking-form button:hover {
            background: #218838;
        }
        .taxi-details img {
            max-width: 100%;
            height: auto;
            max-height: 450px;
            display: inline-block;
        }
        .cart {
            position: absolute;
            top: 10px;
            right: 20px;
            font-size: 1.5em;
            cursor: pointer;
        }
        .cart span {
            background: red;
            color: white;
            border-radius: 50%;
            padding: 3px 7px;
            font-size: 0.8em;
            position: absolute;
            top: -5px;
            right: -10px;
        }
        .vehicle-buttons button {
            padding: 8px 12px;
            margin: 5px;
            border: 2px solid black;
            cursor: pointer;
            border-radius: 4px;
            background: white;
            color: black;
        }
        .vehicle-buttons button.active {
            background: #007bff;
            color: white;
        }
        #total-price {
            font-weight: bold;
            font-size: 1.2em;
            color: #28a745;
            margin-top: 10px;
        }

         /* Cart Sidebar Styles */
         .cart-sidebar {
            position: fixed;
            top: 0;
            right: -350px;
            width: 320px;
            height: 100%;
            background: white;
            box-shadow: -3px 0 10px rgba(0, 0, 0, 0.2);
            padding: 15px;
            overflow-y: auto;
            transition: right 0.3s ease-in-out;
            z-index: 1000;
        }

        .cart-sidebar.open {
            right: 0;
        }

        .cart-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 1.2em;
            border-bottom: 2px solid #ddd;
            padding-bottom: 10px;
        }

        .cart-items {
            margin-top: 15px;
        }

        .cart-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }

        .cart-item img {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 5px;
        }

        .cart-item-info {
            flex-grow: 1;
            margin-left: 10px;
            font-size: 0.9em;
        }

        .cart-total {
            font-size: 1.1em;
            font-weight: bold;
            margin-top: 15px;
            text-align: right;
        }

        .cart-buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .cart-buttons button {
            flex: 1;
            margin: 5px;
            padding: 10px;
            border: none;
            cursor: pointer;
            font-size: 1em;
            border-radius: 5px;
        }

        .close-btn {
            background: #dc3545;
            color: white;
        }

        .place-order-btn {
            background: #28a745;
            color: white;
        }

    </style>
</head>
<body>

<header>
    <a href="#">Home</a> / Taxi Service / Arugambay Airport Taxi
    <h1>Arugambay Airport Taxi</h1>
    <div class="cart" onclick="viewCart()">
        🛒 <span id="cart-count">0</span>
    </div>
</header>

<section class="taxi-details">
    <img id="vehicle-image" src="Arugambay-Airport-Taxi-s.webp" alt="Arugambay Taxi">
    <div class="details">
        <h2 id="vehicle-price">$162.70 – $1121.75</h2>
        <p>Join us for an unforgettable Arugambay Airport Taxi! Covers everything you need for a smooth and enjoyable transport.</p>
        <ul>
            <li>Arugambay to Airport & Airport to Arugambay</li>
            <li>Included: Transport, government tax</li>
        </ul>
        <h3>Vehicles</h3>
        <div class="vehicle-buttons">
            <button onclick="selectVehicle('mini-car', 'mini-car.webp', 162.70)">Mini Car</button>
            <button onclick="selectVehicle('sedan-car', 'sedan-car.webp', 334.30)">Sedan Car</button>
            <button onclick="selectVehicle('flat-roof-van', 'flat-roof-van.webp',550.25)">Flat Roof Van</button>
            <button onclick="selectVehicle('high-roof-van', 'high-roof-van.webp', 717.60)">High Roof Van</button>
            <button onclick="selectVehicle('mini-coach-bus', 'mini-coach-bus.webp', 1121.75)">Mini Coach Bus</button>
        </div>
        <p><a href="#" onclick="clearSelection()">Clear</a></p>
  
<section class="booking-form">
    <h3>Book Your Ride</h3>
    <form id="bookingForm">
       <div class="form-group">
            <div>
                <label for="travel-date">Your Travel Date:</label>
                <input type="date" id="travel-date" name="travel-date" required>
            </div>
            <div>
                <label for="travel-time">Your Travel Time:</label>
                <input type="time" id="travel-time" name="travel-time" required>
            </div>
        </div>

        <div class="form-group">
            <div>
                <label for="vehicle-quantity">Vehicle Quantity:</label>
                <input type="number" id="vehicle-quantity" name="vehicle-quantity" min="1" required oninput="updateTotalPrice()">
            </div>
        </div>

        <p>Total Price: <span id="total-price">$0.00</span></p>

        <button type="submit">Add To Cart</button>
    </form>
</section>

<p>Cart: <span id="cart-count-text">0</span> items</p>
<button onclick="viewCart()">View Cart</button>

 <!-- Cart Sidebar -->
 <div class="cart-sidebar" id="cartSidebar">
    <div class="cart-header">
        <strong>Your Cart</strong>
        <button onclick="closeCart()">❌</button>
    </div>
    <div class="cart-items" id="cart-items"></div>
    <div class="cart-total" id="cart-total">Total: $0.00</div>
    <div class="cart-buttons">
        <button class="close-btn" onclick="closeCart()">Close</button>
       
    <button class="place-order-btn">
    <a id="rent-now-link" href="rented_vehicle.php">  Place Order</button>
</a>

    </div>
</div>


<script>
    let selectedVehicle = null;
    let selectedImage = null;
    let selectedPrice = 0;

    function selectVehicle(vehicle, image, price) {
        document.getElementById("vehicle-image").src = image;
        document.getElementById("vehicle-price").textContent = `$${price.toFixed(2)}`;
        selectedVehicle = vehicle;
        selectedImage = image;
        selectedPrice = price;
        updateTotalPrice();
        updateRentNowLink();
        document.querySelectorAll(".vehicle-buttons button").forEach(button => button.classList.remove("active"));
        event.target.classList.add("active");
    }

    function updateTotalPrice() {
        /*let quantity = document.getElementById("vehicle-quantity").value || 0;
        let totalPrice = selectedPrice * quantity;
        document.getElementById("total-price").textContent = `$${totalPrice.toFixed(2)}`;*/

        let quantity = parseInt(document.getElementById("vehicle-quantity").value) || 0;
    let totalPrice = selectedPrice * quantity;
    
    if (selectedVehicle) {
        document.getElementById("total-price").innerHTML = `
            ${selectedVehicle} (Unit Price: $${selectedPrice.toFixed(2)}) × ${quantity} = <strong>$${totalPrice.toFixed(2)}</strong>
        `;
    } else {
        document.getElementById("total-price").textContent = "$0.00";
    }
    updateRentNowLink();
}



document.getElementById("bookingForm").addEventListener("submit", function(event) {
    event.preventDefault();
    
    let quantity = parseInt(document.getElementById("vehicle-quantity").value) || 0;
    if (!selectedVehicle || quantity < 1) {
        alert("Please select a vehicle and enter a valid quantity.");
        return;
    }
    
/*document.getElementById("bookingForm").addEventListener("submit", function(event) {
            event.preventDefault();*/
            let booking = {
              
                date: document.getElementById("travel-date").value,
                time: document.getElementById("travel-time").value,
                quantity: document.getElementById("vehicle-quantity").value,
                vehicle: selectedVehicle,
                quantity: quantity,
                unitPrice: selectedPrice,
                totalPrice: selectedPrice * quantity
            };

            let cart = JSON.parse(localStorage.getItem("cart")) || [];
            cart.push(booking);
            localStorage.setItem("cart", JSON.stringify(cart));
            updateCartCount();
            alert("Your booking has been added to the cart!");
        });

        function updateRentNowLink() {
    let quantity = document.getElementById("vehicle-quantity").value;
    let totalPrice = selectedPrice * quantity; 
    let rentNowLink = document.getElementById("rent-now-link");
    if (selectedVehicle) {
        rentNowLink.href = `rented_vehicle.php?vehicle=${encodeURIComponent(selectedVehicle)}&image=${encodeURIComponent(selectedImage)}&quantity=${quantity}&price=${totalPrice}`;
    } else {
        rentNowLink.href = "rented_vehicle.php"; // Default if no vehicle is selected
    }
}


        function updateCartCount() {
            let cart = JSON.parse(localStorage.getItem("cart")) || [];
            document.getElementById("cart-count").textContent = cart.length;
            document.getElementById("cart-count-text").textContent = cart.length;
        }

        function viewCart() {
        let cart = JSON.parse(localStorage.getItem("cart")) || [];
        let cartItemsContainer = document.getElementById("cart-items");
        let cartTotal = document.getElementById("cart-total");
        cartItemsContainer.innerHTML = "";
        let totalAmount = 0;

        cart.forEach((item, index) => {
            let itemTotal = item.unitPrice * item.quantity;
            totalAmount += itemTotal;

            let cartItem = document.createElement("div");
            cartItem.classList.add("cart-item");
            cartItem.innerHTML = `
                <img src="${item.vehicle}.webp" alt="${item.vehicle}">
                <div class="cart-item-info">
                    <strong>${item.vehicle}</strong><br>
                    $${item.unitPrice.toFixed(2)} x ${item.quantity} = <strong>$${itemTotal.toFixed(2)}</strong>
                </div>
            `;
            cartItemsContainer.appendChild(cartItem);
        });

        cartTotal.textContent = `Total: $${totalAmount.toFixed(2)}`;

        document.getElementById("cartSidebar").classList.add("open");
    }

    function closeCart() {
        document.getElementById("cartSidebar").classList.remove("open");
    }

    updateCartCount();

        /*function viewCart() {
            let cart = JSON.parse(localStorage.getItem("cart")) || [];
            alert(cart.length === 0 ? "Your cart is empty." : "You have " + cart.length + " bookings in your cart.");
        }*/

        function clearSelection() {
        document.getElementById("vehicle-image").src = "Arugambay-Airport-Taxi-s.webp";
        document.getElementById("vehicle-price").textContent = "$162.70 – $1121.75";
        selectedPrice = 0;
        updateTotalPrice();
        document.querySelectorAll(".vehicle-buttons button").forEach(button => button.classList.remove("active"));

        // Clear the cart when user clicks "Clear"
        localStorage.removeItem("cart");
        updateCartCount();
    }

       /* function viewCart() {
    let cart = JSON.parse(localStorage.getItem("cart")) || [];
    if (cart.length === 0) {
        alert("Your cart is empty.");
        return;
    }
    
    let cartDetails = cart.map(item => 
        `${item.vehicle} -> ${item.quantity} x $${item.unitPrice.toFixed(2)} = $${item.totalPrice.toFixed(2)}`
    ).join("\n");

    alert(`Your Cart:\n${cartDetails}`);
}*/

        // Clear cart when page refreshes
    window.addEventListener("load", function () {
        localStorage.removeItem("cart");
        updateCartCount();
    });

        document.addEventListener("DOMContentLoaded", updateCartCount);
   

   
</script>

</body>
</html>
