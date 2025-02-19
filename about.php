<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About - Green Kids Academy</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin: auto;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #2c6e49;
        }

        .section {
            display: flex;
            align-items: center;
            margin: 30px 0;
            padding: 20px;
            border-radius: 10px;
        }

        .section:nth-child(odd) {
            background-color: #eaf4ea;
        }

        .section:nth-child(even) {
            background-color: #d4edda;
        }

        .text-content {
            flex: 1;
            padding: 20px;
        }

        .text-content h2 {
            color: #2c6e49;
        }

        .text-content p {
            color: #333;
            font-size: 16px;
        }

        .image-content {
            flex: 1;
            text-align: center;
        }

        .image-content img {
            width: 80%;
            max-width: 300px;
            border-radius: 10px;
        }

        .teaching-topics {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            text-align: center;
            margin: 30px 0;
        }

        .topic {
            background: #eaf4ea;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        .topic img {
            width: 50px;
            height: 50px;
            margin-bottom: 10px;
        }

        .topic h3 {
            color: #2c6e49;
            font-size: 18px;
        }

        .topic p {
            font-size: 14px;
            color: #333;
        }

        @media (max-width: 768px) {
            .section {
                flex-direction: column;
                text-align: center;
            }
        }

        .php-version {
            text-align: center;
            font-size: 14px;
            color: #555;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<?php include('includes/header.php'); ?>

<div class="container">
    <h1>About Green Kids Academy</h1>

    <div class="section">
        <div class="text-content">
            <h2>Introduction</h2>
            <p>Green Kids Academy is a place where kids can learn about nature, the environment, and how they can help make the world a better place. Our goal is to educate and inspire the next generation of environmental stewards through fun, educational content, games, and activities.</p>
        </div>
        <div class="image-content">
            <img src="assets/images/about_intro.png" alt="Kids Learning About Environment">
        </div>
    </div>

    <div class="section">
        <div class="image-content">
            <img src="assets/images/mission.png" alt="Our Mission">
        </div>
        <div class="text-content">
            <h2>Our Mission</h2>
            <p>At Green Kids Academy, we aim to spark curiosity in kids and provide them with the tools they need to understand and protect the environment. We believe that small actions can make a big difference, and our platform empowers young learners to take action in their own lives to create positive change.</p>
        </div>
    </div>

    <h2 style="text-align: center; color: #2c6e49;">What We Teach</h2>
    <div class="teaching-topics">
        <div class="topic">
            <h3>Environmental Awareness</h3>
            <p>Understanding the impact of human activities on the Earth and how to reduce our carbon footprint.</p>
        </div>

        <div class="topic">
            <h3>Biodiversity & Conservation</h3>
            <p>Learning about wildlife, endangered species, and how to protect the habitats they rely on.</p>
        </div>

        <div class="topic">
            <h3>Recycling & Sustainability</h3>
            <p>Discovering how to reuse, reduce, and recycle in a way that helps the planet.</p>
        </div>

        <div class="topic">
            <h3>Climate Change</h3>
            <p>Exploring the causes and effects of climate change and how we can fight it together.</p>
        </div>
    </div>

    <div class="section">
        <div class="text-content">
            <h2>Why It Matters</h2>
            <p>Kids are our future, and teaching them about the environment early on is the first step toward a sustainable future. By instilling good habits and environmental values, we can ensure that the next generation grows up to be passionate, knowledgeable advocates for our planet.</p>
        </div>
        <div class="image-content">
            <img src="assets/images/why_it_matter.png" alt="Why It Matters">
        </div>
    </div>


</div>

<?php include('includes/footer.php'); ?>

</body>
</html>
