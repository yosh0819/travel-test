
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taxi Service</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <header>
        <h1>Taxi Service</h1>
    </header>

    <section class="taxi-container">
        <div class="taxi-card" onclick="redirectToService('bentota')">
            <img src="Bentota-Airport-Taxi.webp" alt="Bentota Airport Taxi">
            <h3>Bentota Airport Taxi</h3>
            <p>$51.65 – $356.16</p>
        </div>

        <div class="taxi-card" onclick="redirectToService('mirissa')">
            <img src="Mirissa-Airport-Taxi.webp" alt="Mirissa Airport Taxi">
            <h3>Mirissa Airport Taxi</h3>
            <p>$65.04 – $528.00</p>
        </div>

        <div class="taxi-card" onclick="redirectToService('hiriketiya')">
            <img src="Hiriketiya-Airport-Taxi.webp" alt="Hiriketiya Airport Taxi">
            <h3>Hiriketiya Airport Taxi</h3>
            <p>$80.17 – $582.03</p>
        </div>

        <div class="taxi-card" onclick="redirectToService('weligama')">
            <img src="Weligama-Airport-Taxi.webp" alt="Weligama Airport Taxi">
            <h3>Weligama Airport Taxi</h3>
            <p>$62.35 – $509.60</p>
        </div>

        <div class="taxi-card" onclick="redirectToService('arugambay')">
            <img src="Arugambay-Airport-Taxi.webp" alt="Arugambay Airport Taxi">
            <h3>Arugambay Airport Taxi</h3>
            <p>$162.70– $1,121.75</p>
        </div>

        <div class="taxi-card" onclick="redirectToService('colombo')">
            <img src="Colombo-Airport-Taxi.webp" alt="Colombo Airport Taxi">
            <h3>Colombo Airport Taxi</h3>
            <p>$27.45– $165.27</p>
        </div>

</section>

    <script>
        function redirectToService(service) {
            window.location.href = service + ".php";
        }
    </script>

</body>
</html>
