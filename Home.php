<html>
<head>
    <title>Home</title>
    <link href="styles/home_Styleee.css" rel="stylesheet">
    <link href="styles/HF1_style.css" rel="stylesheet">
</head>
<body>
    <?php include('checking_header.php'); ?>
<div class="bg">
        <div class="box">
            <img src="image/welcome_message.jpg" alt="" class="box-image">
            <h1>Pet Adoption</h1>
            <h5>Buying a pet is not cheap, why not adopt one?</h5>
            <br>
            <p>Adoption will not only save the life of the pet you are adopting 
                but will also make room and free up precious resources for another 
                animal that the shelter will take in. 
                We provide a wide range of pet for you to adopt! 
                Dog, cat, rabbit, hamster are the most popular choice of our customer!
            </p>
            <br><br>
            <button class="button1" onclick="window.location.href='view_pet.php'">Explore More</button>
        </div>
</div>

    <?php include('footer.html'); ?>
</body>
</html>