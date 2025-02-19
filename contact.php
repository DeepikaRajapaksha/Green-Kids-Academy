<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Green Kids Academy</title>
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

        p {
            text-align: center;
            font-size: 16px;
            color: #333;
        }

        .contact-form {
            display: flex;
            flex-direction: column;
            max-width: 500px;
            margin: auto;
            padding: 20px;
            background: #eaf4ea;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        .contact-form label {
            font-weight: bold;
            margin-top: 10px;
            color: #2c6e49;
        }

        .contact-form input,
        .contact-form textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .contact-form textarea {
            height: 100px;
            resize: none;
        }

        .contact-form button {
            margin-top: 15px;
            background-color: #2c6e49;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .contact-form button:hover {
            background-color: #255b3c;
        }

        .contact-info {
            margin-top: 30px;
            text-align: center;
        }

        .contact-info p {
            font-size: 16px;
            color: #333;
        }

        .social-links {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 20px;
        }

        .social-links a {
            text-decoration: none;
            font-size: 18px;
            color: #2c6e49;
            font-weight: bold;
        }

        .social-links a:hover {
            color: #255b3c;
        }
    </style>
</head>
<body>

<?php include('includes/header.php'); ?>

<br>
<br>

<div class="container">
    <h1>Get in Touch!</h1>
    <p>We would love to hear from you! Whether you have questions about our lessons, want to learn more about the environment, or have ideas for new activities, feel free to reach out.</p>

    <form class="contact-form" action="process_contact.php" method="POST">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email Address</label>
        <input type="email" id="email" name="email" required>

        <label for="message">Message</label>
        <textarea id="message" name="message" required></textarea>

        <button type="submit">Send Message</button>
    </form>

    <div class="contact-info">
        <p>Alternatively, you can reach us at:</p>
        <p><strong>Email:</strong> contact@greenkids.com</p>
        <p><strong>Phone:</strong> +123-456-7890</p>

        <h2>Follow us on social media for more updates and fun content!</h2>
        <div class="social-links">
            <a href="https://facebook.com/GreenKidsAcademy" target="_blank">Facebook</a>
            <a href="https://instagram.com/GreenKidsAcademy" target="_blank">Instagram</a>
            <a href="https://twitter.com/GreenKids" target="_blank">Twitter</a>
        </div>
    </div>

    <p style="text-align: center; margin-top: 20px;">We look forward to hearing from you and working together to create a greener world!</p>
</div>

<br>
<br>

<?php include('includes/footer.php'); ?>

</body>
</html>
