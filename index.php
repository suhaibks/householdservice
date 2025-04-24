<?php include "includes/header.php"; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Home - EasyHome Services</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        .section {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 50px 20px;
            gap: 40px;
            flex-wrap: wrap;
        }

        .section:nth-child(even) {
            flex-direction: row-reverse;
            background-color: #f8f9fb;
        }

        .section img {
            width: 45%;
            max-width: 400px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        .section-text {
            flex: 1;
            min-width: 280px;
        }

        .section-text h2 {
            font-size: 28px;
            margin-bottom: 10px;
            color: #0077cc;
        }

        .section-text p {
            font-size: 16px;
            line-height: 1.6;
        }

        .explore-btn {
            display: block;
            width: fit-content;
            margin: 50px auto;
            padding: 12px 30px;
            background: #0077cc;
            color: white;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 600;
        }

        .explore-btn:hover {
            background: #005fa3;
        }
        
        footer {
        background-color: #f8f8f8;
        text-align: center;
        padding: 15px;
        border-top: 1px solid #ccc;
        color: #444;
        font-size: 14px;
        margin-top: 40px;
    }
    
    main {
    min-height: 70vh;
    padding-bottom: 40px;
}

.hero-banner {
    background: url('images/hero-banner.jpeg') no-repeat center center/cover;
    height: 70vh;
    padding: 100px 20px 20px; /* Top padding keeps header clear */
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    text-align: center;
    position: relative;
    box-sizing: border-box;
}


.hero-banner::before {
    z-index: 1;
}

.hero-text {
    z-index: 2;
    max-width: 700px;
}

.hero-text h1 {
    font-size: 42px;
    margin-bottom: 20px;
}

.hero-text p {
    font-size: 18px;
    margin-bottom: 30px;
    line-height: 1.6;
}

.hero-btn {
    padding: 12px 30px;
    background: #0077cc;
    color: white;
    border: none;
    border-radius: 6px;
    text-decoration: none;
    font-weight: bold;
    font-size: 16px;
}

.hero-btn:hover {
    background: #005fa3;
}


    </style>
</head>
<body>
    <main>
        <!-- Hero Banner -->
<section class="hero-banner">
    <div class="hero-text">
        <h1>Bringing Expert Services to Your Doorstep</h1>
        <p>Book trusted professionals for cleaning, repairs, installations & more — all from one place.</p>
        <a href="services.php" class="hero-btn">Book a Service</a>
    </div>
</section>

        <!-- Section 1 -->
        <div class="section">
            <div class="section-text">
                <h2>Welcome to EasyHome Services</h2>
                <p>
                    Your one-stop destination for trusted and affordable household services.
                    From fixing your lights to deep cleaning your kitchen, we've got verified professionals ready to help—right at your doorstep.
                </p>
            </div>
            <img src="images/home-cleaning.jpeg" alt="Cleaning Service">
        </div>

        <!-- Section 2 -->
        <div class="section">
            <div class="section-text">
                <h2>Verified Professionals, Seamless Booking</h2>
                <p>
                    Our service partners are background-verified and trained to ensure the highest quality of service.
                    Book your service in just 3 steps—Select, Schedule, and Relax.
                </p>
            </div>
            <img src="images/verified-worker.jpeg" alt="Verified Worker">
        </div>

        <!-- Section 3 -->
        <div class="section">
            <div class="section-text">
                <h2>We Care About Your Home</h2>
                <p>
                    EasyHome is built with one mission—making your everyday life easier by connecting you to skilled experts.
                    We respect your time, your home, and your trust.
                </p>
            </div>
            <img src="images/home-care.jpeg" alt="We Care">
        </div>

        <!-- CTA Button -->
        <a href="services.php" class="explore-btn">Explore Our Services</a>
    </main>

    <?php include "includes/footer.php"; ?>
</body>
</html>
