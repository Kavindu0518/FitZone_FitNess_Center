<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery - FitZone Fitness Center</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
</head>
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
    background-color: #121212; /* Dark background */
    color: #e0e0e0; /* Light text */
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

/* Gallery Section */
.gallery {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 20px;
    max-width: 1200px;
    margin: 40px auto;
    padding: 0 20px;
}

.gallery-item {
    overflow: hidden;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.gallery-item img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.gallery-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 15px rgba(0, 0, 0, 0.7);
}

.gallery-item:hover img {
    transform: scale(1.1); /* Slight zoom effect on hover */
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

/* Responsive Design */
@media (max-width: 768px) {
    header .hero h1 {
        font-size: 2rem;
    }

    .gallery {
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    }
}
</style>
<body>
    <header>
        <div class="hero">
            <h1>Our Gallery</h1>
            <p>Take a peek into the vibrant life at FitZone Fitness Center!</p>
        </div>
    </header>

    <main>
        <section class="gallery">
            <div class="gallery-item">
                <img src="https://via.placeholder.com/400x300" alt="Fitness Center Image 1">
            </div>
            <div class="gallery-item">
                <img src="https://via.placeholder.com/400x300" alt="Fitness Center Image 2">
            </div>
            <div class="gallery-item">
                <img src="https://via.placeholder.com/400x300" alt="Fitness Center Image 3">
            </div>
            <div class="gallery-item">
                <img src="https://via.placeholder.com/400x300" alt="Fitness Center Image 4">
            </div>
            <div class="gallery-item">
                <img src="https://via.placeholder.com/400x300" alt="Fitness Center Image 5">
            </div>
            <div class="gallery-item">
                <img src="https://via.placeholder.com/400x300" alt="Fitness Center Image 6">
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 FitZone Fitness Center. All rights reserved.</p>
    </footer>
</body>
</html> -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery - FitZone Fitness Center</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
</head>
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
    background-color: #121212; /* Dark background */
    color: #e0e0e0; /* Light text */
}

/* Header */
header .hero {
    background: linear-gradient(to right, #1f1f1f, #333333);
    color: #ffffff;
    text-align: center;
    padding: 50px 20px;
    border-bottom-left-radius: 50px;
    border-bottom-right-radius: 50px;
}

header .hero h1 {
    font-size: 2.5rem;
    font-weight: bold;
    margin-bottom: 10px;
    color: #ffa500;
}

header .hero p {
    font-size: 1.2rem;
    color: #cccccc;
}

/* Slider Section */
.slider {
    position: relative;
    max-width: 1200px;
    margin: 40px auto;
    overflow: hidden;
    border-radius: 15px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
}

.slides {
    display: flex;
    transition: transform 0.5s ease-in-out;
}

.slide {
    min-width: 100%;
    transition: opacity 0.5s ease;
    opacity: 0;
}

.slide.active {
    opacity: 1;
}

.slide img {
    width: 100%;
    height: auto;
}

/* Navigation Buttons */
.slider button {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background: rgba(0, 0, 0, 0.5);
    color: #fff;
    border: none;
    padding: 10px 20px;
    font-size: 1.5rem;
    cursor: pointer;
    z-index: 10;
    border-radius: 50%;
    transition: background 0.3s;
}

.slider button:hover {
    background: rgba(255, 165, 0, 0.8);
}

.slider .prev {
    left: 10px;
}

.slider .next {
    right: 10px;
}

/* Static Gallery */
.gallery {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 20px;
    max-width: 1200px;
    margin: 40px auto;
    padding: 0 20px;
}

.gallery-item {
    overflow: hidden;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.gallery-item img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.gallery-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 15px rgba(0, 0, 0, 0.7);
}

.gallery-item:hover img {
    transform: scale(1.1);
}

/* Footer */
footer {
    text-align: center;
    background: #1f1f1f;
    color: #777;
    padding: 20px 0;
    margin-top: 40px;
    border-top: 1px solid #333;
}
</style>
<body>
<?php
	include("customerheader.php");
?>
    <header>
        <div class="hero">
            <h1>Our Gallery</h1>
            <p>Take a peek into the vibrant life at FitZone Fitness Center!</p>
        </div>
    </header>

    <main>
        <!-- Image Slider -->
        <section class="slider">
            <div class="slides">
                <div class="slide active">
                    <img src="../assets/index4.jpg" alt="Fitness Image 1">
                </div>
                <div class="slide">
                    <img src="../assets/gallery1.jfif" alt="Fitness Image 2">
                </div>
                <div class="slide">
                    <img src="../assets/gallery2.jpg" alt="Fitness Image 3">
                </div>
            </div>
            <button class="prev">&lt;</button>
            <button class="next">&gt;</button>
        </section>

        <!-- Static Gallery -->
        <section class="gallery">
            <div class="gallery-item">
                <img src="../assets/gallery3.jfif" alt="Fitness Center Image 1">
            </div>
            <div class="gallery-item">
                <img src="../assets/gallery1.jfif" alt="Fitness Center Image 2">
            </div>
            <div class="gallery-item">
                <img src="../assets/gallery2.jpg" alt="Fitness Center Image 3">
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 FitZone Fitness Center. All rights reserved.</p>
    </footer>

    <script src="script.js"></script>
</body>
</html>