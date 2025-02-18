<?php include('includes/header.php'); ?>

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
        <h2>Welcome to Green Kids Academy!</h2>
        <h3>Introduction</h3>
        <p>Join us in exploring the wonders of our planet! At Green Kids Academy, we believe that learning about the environment 
            should be fun and exciting. From the magical forests to the deep oceans, there’s so much to discover! Our mission is to
             inspire young minds to care for and protect our Earth.</p>
        <?php
        
        $articles = [
            ['title' => 'Let’s Explore Together!', 'content' => 'Are you ready to be an environmental hero? Green Kids Academy 
            offers a collection of exciting lessons, fun games, and creative activities that teach you about the importance of 
            nature and how we can all contribute to a cleaner, greener world. Whether it’s understanding recycling, learning 
            about endangered species, or discovering how trees help clean our air, you will have lots of fun while learning'],
           
        ];

        foreach ($articles as $article) {
            echo "<div class='article'>";
            echo "<h3>" . $article['title'] . "</h3>";
            echo "<p>" . $article['content'] . "</p>";
            echo "<a href='login.php'>Learn More</a>";
            echo "</div>";
        }
        ?>
    </div>
</div>

<?php include('includes/footer.php'); ?>

