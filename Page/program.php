
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explore All Classes</title>
    <link rel="stylesheet" href="../Styles/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<style>
    /* Reset Styles */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Poppins', sans-serif;
    background: #121212;
    color: #e0e0e0;
}

/* Header */
header {
    /* background: linear-gradient(to right, #6a11cb, #2575fc); */
    background-color: #1f1f1f;
    color: #ffffff;
    text-align: center;
    padding: 40px 0;
    font-size: 2rem;
    font-weight: bold;
    letter-spacing: 1px;
    border-bottom-left-radius: 50px;
    border-bottom-right-radius: 50px;
}

/* Main Layout */
main {
    display: flex;
    max-width: 1200px;
    margin: 30px auto;
    gap: 30px;
    padding: 0 20px;
}

/* Sidebar */
.sidebar {
    /* background: white; */
    background-color: #1c1c1c;
    color: #e0e0e0;
    padding: 25px;
    border: 1px solid #333;
    border-radius: 15px;
    width: 25%;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

.sidebar h3 {
    margin-bottom: 10px;
    font-size: 18px;
    color: #444;
}

.sidebar input[type="text"] {
    width: 100%;
    padding: 12px;
    border-radius: 25px;
    border: 1px solid #ddd;
    outline: none;
    margin-bottom: 20px;
}

.sidebar label {
    display: flex;
    align-items: center;
    gap: 8px;
    margin: 10px 0;
    font-size: 14px;
}

.sidebar input[type="checkbox"],
.sidebar input[type="radio"] {
    accent-color: #6a11cb;
    cursor: pointer;
}

/* Classes Container */
.classes-container {
    /* width: 75%; */
    max-height: 500px;
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 20px;
    overflow-y: auto;
}

.class-card {
    height: 350px;
    background: white;
    background-color: #1f1f1f;
    color: #ffffff;
    border-radius: 15px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.class-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
}

.class-card img {
    width: 100%;
    height: 180px;
    object-fit: cover;
    filter: brightness(0.8);
}

.card-info {
    padding: 20px;
    text-align: center;
}

.card-info h3 {
    font-size: 18px;
    margin: 10px 0;
    color: #333;
    font-weight: bold;
}

.card-info .class-category {
    font-size: 12px;
    text-transform: uppercase;
    letter-spacing: 1px;
    color: #6a11cb;
    font-weight: bold;
}

.card-info .duration {
    font-size: 14px;
    color: #777;
    margin-bottom: 15px;
}

.view-class {
    display: inline-block;
    padding: 8px 20px;
    /* background: linear-gradient(to right, #6a11cb, #2575fc);
    background-color: #6a11cb;
    color: #ffffff; */
    color: var(--white);
    background-color: var(--secondary-color);
    text-decoration: none;
    border-radius: 25px;
    font-size: 14px;
    font-weight: bold;
    transition: background 0.3s;
}

.view-class:hover {
    /* background: linear-gradient(to right, #2575fc, #6a11cb); */
    background-color: var(--secondary-color-dark);
}

/* Responsiveness */
@media (max-width: 768px) {
    main {
        flex-direction: column;
    }

    .sidebar {
        width: 100%;
    }

    .classes-container {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 480px) {
    .classes-container {
        grid-template-columns: 1fr;
    }
}

/* Sidebar Input Fields */
.sidebar input[type="text"] {
    background-color: #2c2c2c; /* Dark input background */
    color: #e0e0e0; /* Light text */
    border: 1px solid #444; /* Subtle border */
}

.sidebar input[type="checkbox"],
.sidebar input[type="radio"] {
    accent-color: #6a11cb; /* Purple checkboxes and radios */
}

/* Optional: Change Scrollbar for Consistency */
::-webkit-scrollbar {
    width: 10px;
}

::-webkit-scrollbar-thumb {
    color: var(--white);
    background-color: var(--secondary-color); /* Purple accent */
    border-radius: 10px;

}

::-webkit-scrollbar-track {
    background-color: #1c1c1c; /* Dark track */
}
</style>
<body>
<?php
	include("customerheader.php");
?>
    <header>
        <h1>EXPLORE ALL CLASSES</h1>
    </header>

    <main>
        <div class="sidebar">
            <input type="text" placeholder="🔍 Search for a class" class="search-bar">
            <p><strong>46 results</strong> in total <a href="#" class="clear-filter">Clear filters</a></p>
            
            <div class="filter-group">
                <h3>CLUB</h3>
                <select>
                    <option>All Clubs</option>
                    <option>Club A</option>
                    <option>Club B</option>
                </select>
            </div>

            <!-- <div class="filter-group">
                <h3>TYPE OF CLASSES</h3>
                <label><input type="checkbox"> Cardio</label>
                <label><input type="checkbox"> Cycling</label>
                <label><input type="checkbox"> Dance</label>
                <label><input type="checkbox"> HIIT</label>
                <label><input type="checkbox"> Strength</label>
            </div> -->

            <div class="filter-group">
                <h3>TYPE OF CLASSES</h3>
                <label><input type="checkbox" class="filter-checkbox" value="cardio"> Cardio</label>
                <label><input type="checkbox" class="filter-checkbox" value="cycling"> Cycling</label>
                <label><input type="checkbox" class="filter-checkbox" value="dance"> Dance</label>
                <label><input type="checkbox" class="filter-checkbox" value="hiit"> HIIT</label>
                <label><input type="checkbox" class="filter-checkbox" value="strength"> Strength</label>
            </div>

            <!-- <div class="filter-group">
                <h3>COMPLEXITY</h3>
                <label><input type="radio" name="complexity"> Beginner</label>
                <label><input type="radio" name="complexity"> Intermediate</label>
                <label><input type="radio" name="complexity"> Advanced</label>
            </div> -->

            <div class="filter-group">
                <h3>COMPLEXITY</h3>
                <label><input type="radio" name="complexity" class="complexity-radio" value="beginner"> Beginner</label>
                <label><input type="radio" name="complexity" class="complexity-radio" value="intermediate"> Intermediate</label>
                <label><input type="radio" name="complexity" class="complexity-radio" value="advanced"> Advanced</label>
                <label><input type="radio" name="complexity" class="complexity-radio" value="all" checked> All</label>
            </div>
        </div>


        <div class="classes-container">
            
            <?php
            // Include database connection
            include 'dbconnect.php';

            // Query to fetch class details
            $query = "SELECT * FROM class_tbl";
            $result = mysqli_query($con, $query);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $classId = $row['class_id'];
                    $className = htmlspecialchars($row['class_name']);
                    $classType = htmlspecialchars($row['class_type']);
                    $classComplexity = htmlspecialchars($row['class_complexity']);
                    $classDuration = htmlspecialchars($row['class_min']);
                    $classImage = htmlspecialchars($row['class_image']);

                    echo "
                    <div class='class-card' data-type='$classType' data-complexity='$classComplexity'>
                        <img src='$classImage' alt='$$classComplexity'>
                        <div class='card-info'>
                            <p class='class-category'>" . ucfirst($classType) . "</p>
                            <h3>$className</h3>
                            <p class='duration'>$classDuration mins</p>
                            
                            <a href='https://www.youtube.com/watch?v=yXHgcYpUVD4' class='view-class' target='_blank'>View class</a>
                        </div>
                    </div>";
                }
            } else {
                echo "<p>No classes found.</p>";
            }
            ?>


            <div class="class-card" data-type="dance">
                <img src="../assets/class03.jfif" alt="Dance Class">
                <div class="card-info">
                    <p class="class-category">Dance</p>
                    <h3>DANCE FITNESS</h3>
                    <p class="duration">50 mins</p>
                    <a href="#" class="view-class">View class</a>
                </div>
            </div>

            <div class="class-card" data-type="strength">
                <img src="../assets/class01.jfif" alt="Strength Class">
                <div class="card-info">
                    <p class="class-category">Strength</p>
                    <h3>STRENGTH TRAINING</h3>
                    <p class="duration">40 mins</p>
                    <a href='https://youtu.be/AdqrTg_hpEQ?si=gmptFqzkNZgV8gbW' class='view-class' target='_blank'>View class</a>
                </div>
            </div>
            <!-- -------------------------------- -->

            <div class="class-card" data-complexity="beginner">
                <img src="../assets/class02.jfif" alt="Beginner Class">
                <div class="card-info">
                    <p class="class-category">Cardio</p>
                    <h3>BEGINNER CARDIO</h3>
                    <p class="duration">30 mins</p>
                    <a href='https://www.youtube.com/watch?v=Sou12pLJFCc&list=PL5qo1Sl2GW3cMiepxpnY3vjo7MPM-ejBh' class='view-class' target='_blank'>View class</a>
                </div>
            </div>

            <div class="class-card" data-complexity="intermediate">
                <img src="../assets/class05.jpg" alt="Intermediate Class">
                <div class="card-info">
                    <p class="class-category">Cycling</p>
                    <h3>INTERMEDIATE CYCLING</h3>
                    <p class="duration">45 mins</p>
                    <a href='https://www.youtube.com/watch?v=Epit6DSq_ww' class='view-class' target='_blank'>View class</a>
                </div>
            </div>

            <div class="class-card" data-complexity="advanced">
                <img src="../assets/class04.jfif" alt="Advanced Class">
                <div class="card-info">
                    <p class="class-category">HIIT</p>
                    <h3>ADVANCED HIIT</h3>
                    <p class="duration">60 mins</p>
                    <a href='https://www.youtube.com/watch?v=-hSma-BRzoo' class='view-class' target='_blank'>View class</a>
                </div>
            </div>
            

        </div>

    </main>
    <script>
        // JavaScript for filtering classes
        document.querySelectorAll('.filter-checkbox').forEach(checkbox => {
            checkbox.addEventListener('change', () => {
                const selectedTypes = Array.from(
                    document.querySelectorAll('.filter-checkbox:checked')
                ).map(cb => cb.value); // Get all selected filter values

                document.querySelectorAll('.class-card').forEach(card => {
                    const cardType = card.getAttribute('data-type');
                    // Show or hide the card based on filter match
                    if (selectedTypes.length === 0 || selectedTypes.includes(cardType)) {
                        card.style.display = 'block';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        });

        // JavaScript for filtering classes by complexity
        document.querySelectorAll('.complexity-radio').forEach(radio => {
            radio.addEventListener('change', () => {
                const selectedComplexity = document.querySelector('.complexity-radio:checked').value;

                document.querySelectorAll('.class-card').forEach(card => {
                    const cardComplexity = card.getAttribute('data-complexity');
                    
                    // Show cards matching the selected complexity or show all if "all" is selected
                    if (selectedComplexity === 'all' || cardComplexity === selectedComplexity) {
                        card.style.display = 'block';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        });

    </script>
</body>
</html>