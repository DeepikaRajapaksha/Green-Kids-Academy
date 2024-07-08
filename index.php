<?php include('includes/header.php'); ?>

<div class="container">
    <div class="hero-section">
        <div class="slideshow-container">
            <div class="mySlides fade">
                <img src="assets/images/welcome1.png" style="width:100%">
                <div class="text">Slide 1 Caption</div>
            </div>
            <div class="mySlides fade">
                <img src="assets/images/welcome2.png" style="width:100%">
                <div class="text">Slide 2 Caption</div>
            </div>
            <div class="mySlides fade">
                <img src="assets/images/welcome3.png" style="width:100%">
                <div class="text">Slide 3 Caption</div>
            </div>
            <div class="mySlides fade">
                <img src="assets/images/welcome4.png" style="width:100%">
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
        <h2>Featured Articles</h2>
        <!-- Example articles, replace with dynamic content later -->
        <?php
        // Example of dynamic PHP content
        $articles = [
            ['title' => 'Why Recycling Matters', 'content' => 'Recycling helps to reduce waste in landfills and conserves natural resources. Learn how you can recycle more effectively at home and school...'],
            ['title' => 'Saving Water', 'content' => 'Water is a precious resource, and it\'s important to use it wisely. Find out how you can save water in your daily life and help protect our environment...']
        ];

        foreach ($articles as $article) {
            echo "<div class='article'>";
            echo "<h3>" . $article['title'] . "</h3>";
            echo "<p>" . $article['content'] . "</p>";
            echo "<a href='#'>Read more</a>";
            echo "</div>";
        }
        ?>
    </div>
</div>

<?php include('includes/footer.php'); ?>

