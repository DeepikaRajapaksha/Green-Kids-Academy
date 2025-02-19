<?php include('includes/header.php'); ?>
<style>
        .article-container {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            padding: 15px;
            border-radius: 10px;
            background-color: #f9f9f9;
        }

        .article-image img {
            width: 400px; 
            height: auto;
            margin-right: 50px;
            border-radius: 10px;
        }

        .article-content {
            max-width: 800px; 
        }

        .article-content h3 {
            margin: 0 0 10px;
            color: #2c6e49;
        }

        .article-content p {
            margin: 0 0 10px;
            color: #333;
        }

        .article-content a {
            display: inline-block;
            text-decoration: none;
            color: white;
            background-color: #2c6e49;
            padding: 8px 12px;
            border-radius: 5px;
        }

        .article-content a:hover {
            background-color: #1e4d34;
        }
    </style>

<div class="container">
    <div class="hero-section">
        <div class="slideshow-container">
            <div class="mySlides fade">
                <img src="assets/images/welcome4.png" style="width:100%">
                <div class="text">Slide 1 Caption</div>
            </div>
            <div class="mySlides fade">
                <img src="assets/images/welcome1.png" style="width:100%">
                <div class="text">Slide 2 Caption</div>
            </div>
            <div class="mySlides fade">
                <img src="assets/images/welcome2.png" style="width:100%">
                <div class="text">Slide 3 Caption</div>
            </div>
            <div class="mySlides fade">
                <img src="assets/images/welcome3.png" style="width:100%">
                <div class="text">Slide 4 Caption</div>
            </div>
        </div>
        <br>
        <div style="text-align:center">
            <span class="dot" onclick="currentSlide(1)"></span> 
            <span class="dot" onclick="currentSlide(2)"></span> 
            <span class="dot" onclick="currentSlide(3)"></span> 
            <span class="dot" onclick="currentSlide(4)"></span> 
        </div>
        <div class="welcome-text">
            <h1>Welcome to <span class="highlight">Eco Kids</span>, where learning about the environment is fun!</h1>
        </div>
    </div>
    <!-- Other content below -->
    <div class="featured-content">
        <h1><center>Welcome to Green Kids Academy!</center></h1>
        <h2>Introduction</h2>
        <p>Join us in exploring the wonders of our planet! At Green Kids Academy, we believe that learning about the environment 
            should be fun and exciting. From the magical forests to the deep oceans, there’s so much to discover! Our mission is to
             inspire young minds to care for and protect our Earth.</p>
             <?php
$articles = [
    [
        'title' => 'Let’s Explore Together!', 
        'content' => 'At Green Kids Academy, we believe that every small action can make a big difference! 
        Our planet is full of wondersfrom towering rainforests and sparkling rivers to the tiniest insects 
        that play a crucial role in nature. But just like superheroes, the Earth needs protectors, and that’s where YOU come in!
        <br>
        <br>

         Join us on an exciting journey to explore the beauty of our world, understand the challenges it faces, 
         and discover how we can work together to protect it. Through fun lessons, interactive games, and hands-on 
         , you’ll learn about recycling, conservation, endangered species, and even how simple daily habits can help
         keep our environment clean and healthy.
         <br>
         <br>

        Whether you dream of saving the oceans, planting trees, or helping animals, Green Kids Academy is the 
        perfect place to start your adventure. Let’s learn, have fun, and become the environmental leaders of tomorrow! 🌱💚',
        'image' => 'assets/images/intro.png' 
    ],
];

foreach ($articles as $article) {
    echo "<div class='article-container'>";
    echo "<div class='article-content'>";
    echo "<h3>" . $article['title'] . "</h3>";
    echo "<p>" . $article['content'] . "</p>";
    echo "<a href='login.php'>Learn More</a>";
    echo "</div>";
    echo "<div class='article-image'>";
    echo "<img src='" . $article['image'] . "' alt='Introduction Image'>";
    echo "</div>";
    echo "</div>";
}

?>

    </div>
</div>

<?php include('includes/footer.php'); ?>

