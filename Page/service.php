<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services - FitZone Fitness Center</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<!-- <Style>
    /* General Reset */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Poppins', sans-serif;
    line-height: 1.6;
    background-color: #f4f4f4;
    color: #333;
}

/* Header */
header .hero {
    background: linear-gradient(to right, #6a11cb, #2575fc);
    color: #fff;
    text-align: center;
    padding: 50px 20px;
    border-bottom-left-radius: 50px;
    border-bottom-right-radius: 50px;
}

header .hero h1 {
    font-size: 2.5rem;
    font-weight: bold;
    margin-bottom: 10px;
}

header .hero p {
    font-size: 1.2rem;
}

/* Services Section */
.services {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 20px;
    max-width: 1200px;
    margin: 40px auto;
    padding: 0 20px;
}

.service-card {
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    text-align: center;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.service-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
}

.service-card img {
    width: 100%;
    height: 200px;
    object-fit: cover;
}

.service-card h2 {
    font-size: 1.5rem;
    margin: 15px 0;
    color: #2575fc;
}

.service-card p {
    font-size: 1rem;
    padding: 0 15px 20px;
    color: #666;
}

/* Footer */
footer {
    text-align: center;
    background: #1f1f1f;
    color: #ccc;
    padding: 20px 0;
    margin-top: 40px;
}
</style> -->

<style>
    /* General Reset */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Poppins', sans-serif;
    line-height: 1.6;
    background-color: #121212; /* Black background */
    color: #e0e0e0; /* Light gray text */
}

/* Header */
header .hero {
    background: linear-gradient(to right, #1f1f1f, #333333); /* Dark gradient */
    color: #ffffff; /* White text */
    text-align: center;
    padding: 50px 20px;
    border-bottom-left-radius: 50px;
    border-bottom-right-radius: 50px;
}

header .hero h1 {
    font-size: 2.5rem;
    font-weight: bold;
    margin-bottom: 10px;
    color: #ffa500; /* Vibrant orange title */
}

header .hero p {
    font-size: 1.2rem;
    color: #cccccc; /* Subtle gray for subtitle */
}

/* Services Section */
.services {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 20px;
    max-width: 1200px;
    margin: 40px auto;
    padding: 0 20px;
}

.service-card {
    background: #1c1c1c; /* Dark gray card background */
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5); /* Stronger shadow for dark theme */
    overflow: hidden;
    text-align: center;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.service-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 8px 15px rgba(0, 0, 0, 0.7); /* Elevated shadow on hover */
}

.service-card img {
    width: 100%;
    height: 200px;
    object-fit: cover;
    filter: brightness(0.8); /* Slightly darker images */
}

.service-card h2 {
    font-size: 1.5rem;
    margin: 15px 0;
    color: #ffa500; /* Vibrant orange for headings */
}

.service-card p {
    font-size: 1rem;
    padding: 0 15px 20px;
    color: #cccccc; /* Subtle gray text for descriptions */
}

/* Footer */
footer {
    text-align: center;
    background: #1f1f1f; /* Dark footer background */
    color: #777; /* Lighter gray text */
    padding: 20px 0;
    margin-top: 40px;
    border-top: 1px solid #333; /* Subtle border */
}

/* Links and Buttons */
a {
    color: #ffa500; /* Orange links */
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}

/* Responsive Design */
@media (max-width: 768px) {
    header .hero h1 {
        font-size: 2rem;
    }

    .service-card h2 {
        font-size: 1.3rem;
    }
}
</style>
<body>

<?php
	include("customerheader.php");
?>
    <header>
        <div class="hero">
            <h1>Our Services</h1>
            <p>Discover how we can help you achieve your fitness goals!</p>
        </div>
    </header>

    <main>
        <section class="services">
            <div class="service-card">
                <img src="../assets/service1.jfif" alt="State-of-the-Art Equipment">
                <h2>State-of-the-Art Equipment</h2>
                <p>Access top-notch cardio machines, free weights, and strength-training equipment designed to meet your fitness needs.</p>
            </div>

            <div class="service-card">
                <img src="../assets/service2.jfif" alt="Personal Training">
                <h2>Personal Training</h2>
                <p>Our certified trainers will guide and motivate you every step of the way to achieve your individual fitness goals.</p>
            </div>

            <div class="service-card">
                <img src="../assets/service3.jfif" alt="Group Classes">
                <h2>Group Classes</h2>
                <p>Join fun and engaging classes like Yoga, Zumba, HIIT, and more to stay motivated and energized.</p>
            </div>

            <div class="service-card">
                <img src="../assets/service4.jfif" alt="Nutrition Guidance">
                <h2>Nutrition Guidance</h2>
                <p>Get personalized nutrition plans to complement your workouts and help you achieve a balanced lifestyle.</p>
            </div>

            <div class="service-card">
                <img src="../assets/service5.jfif" alt="Membership Plans">
                <h2>Flexible Membership Plans</h2>
                <p>Choose from various membership options designed to fit your lifestyle and budget.</p>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 FitZone Fitness Center. All rights reserved.</p>
    </footer>
</body>
</html>