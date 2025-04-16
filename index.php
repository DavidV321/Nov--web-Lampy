<?php
require_once "./data.php";
require_once "lang.php";
include 'cookies.php'; 

// Defaultní ID pro jídlo a nápoje
$idStranky = "obedy";
$idNapoj = "pivo";

// Načíst ID jídla
if (isset($_GET["id-stranky"]) && array_key_exists($_GET["id-stranky"], $pole_stranek)) {
  $idStranky = $_GET["id-stranky"];
}

// Načíst ID nápoje
if (isset($_GET["id-napoj"]) && array_key_exists($_GET["id-napoj"], $pole_napoju)) {
  $idNapoj = $_GET["id-napoj"];
}
?>

<!DOCTYPE html>
<html lang="cs">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title><?php echo $t["title"]; ?></title>

  <!-- Favicon -->
  <link rel="icon" href="favicon.png" type="image/x-icon" />

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Anton&family=Caveat:wght@400..700&family=Great+Vibes&family=Roboto+Mono:wght@100..700&display=swap" rel="stylesheet">

  <!-- MDB (Material Design Bootstrap) -->
  <link rel="stylesheet" href="css/mdb.min.css" />

  <!-- Vlastní CSS -->
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="lightbox.css">

  <!-- Vlastní JavaScript -->
  
</head>

<body>
  <!-- Start your project here-->
  <header>
    <div class="container">
      <div class="headerTop">
        <div class="logoup">
          <a class="odkaz" href="index.php"><img src="photo/logo lampy 2025-2.jpg" alt=""></a>
        </div>
        <div class="engIcon">
          <a href="?lang=cs"><img src="photo/32202_flag_republic_czech_czech replublic_icon.png" alt="Czech"> Čeština</a> |
          <a href="?lang=en"><img src="photo/2634450_ensign_flag_kingdom_nation_icon.png" alt="English"> English</a>
        </div>
      </div>
    </div>
    <!-- Intro settings -->
    <header class="header">
      <div class="text-section">
        <h1>BEERS & BURGERS</h1>
        <h2>Delicious food</h2>
        <div class="buttons">
          <button><a href="firemky.html"><?php echo $t["Event"]; ?></a></button>
          <button><?php echo $t["reservation"]; ?></button>
        </div>
      </div>
      <img src="photo/profilovka1.jpg" alt="Fotka" class="image">
    </header>


    <main>

      <!-- popis -->

      <section class="descrpt">
    <div class="text">
        <p>
            <?php 
            echo sprintf(
                $t["restaurant_desc"], 
                '<svg width="120" height="40" xmlns="http://www.w3.org/2000/svg">
                    <text x="10" y="25" font-size="16" fill="black">Březňák 11</text>
                    <path d="M10 35 Q 80 25, 130 30" stroke="black" stroke-width="2" fill="none" stroke-linecap="round"/>
                </svg>',
                '<svg width="150" height="40">
                    <text x="10" y="25" font-size="16" fill="black">Velké Březno</text>
                    <ellipse cx="70" cy="20" rx="70" ry="15" stroke="black" stroke-width="2" fill="none"/>
                </svg>'
            ); 
            ?>
        </p>
        <br>
        <p><?php echo $t["restaurant_desc_2"]; ?></p>
    </div>
</section>

      <!-- photo -->

      <!-- <div class="photo-wrap">
          <img src="photo/Farmers.jpg" alt="">
          <img src="photo/2.jpg" alt="">
          <img src="photo/jidlo.jpg" alt="">
        </div> -->

      <div class="photo-info">
        <div class="photo-wrap">
          <img src="photo/zizkov-vez.jpg" alt="">
        </div>
        <div class="photo-text">
          <h1>Lampičky restaurant</h1>
        </div>
        <p><i class="fa-solid fa-phone"></i>+420 / 720 032 300</p>
      </div>


      <!-- menu -->

      <section class="menu">
        <h1><?php echo $t["menu"]; ?></h1>
        <nav>
          <?php require "./menu.php"; ?>
        </nav>

        <div id="food-menu-wraper">
        <?php echo $pole_stranek[$idStranky]->get_obsah($lang); ?>
        </div>
      </section>

      <!-- NÁPOJOVÉ MENU -->
      <section class="drink-menu">
        <h1><?php echo $t["drinks"]; ?></h1>
        <nav>
          <?php require "./drinkmenu.php"; ?>
        </nav>

        <div id="drink-menu-wraper">
        <?php echo $pole_napoju[$idNapoj]->get_obsah($lang); ?>
        </div>
      </section>

      <!-- slidephoto -->
      <section class="slidephoto">
        <h1><?php echo $t["gallery"]; ?></h1>
        <div id="carouselExampleControls" class="carousel slide" data-mdb-ride="carousel" data-mdb-carousel-init>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="photo/Burger2.jpg" class="d-block w-100" alt="Wild Landscape" />
            </div>
            <div class="carousel-item">
              <img src="photo/Burger1.jpg" class="d-block w-100" alt="Camera" />
            </div>
            <div class="carousel-item">
              <img src="photo/Burger3.jpg" class="d-block w-100" alt="Exotic Fruits" />
            </div>
            <div class="carousel-item">
              <img src="photo/Burger4.jpg" class="d-block w-100" alt="Exotic Fruits" />
            </div>
            <div class="carousel-item">
              <img src="photo/Burger6.jpg" class="d-block w-100" alt="Exotic Fruits" />
            </div>
            <div class="carousel-item">
              <img src="photo/Burger10.jpg" class="d-block w-100" alt="Exotic Fruits" />
            </div>
            <div class="carousel-item">
              <img src="photo/Jidlo1.jpg" class="d-block w-100" alt="Exotic Fruits" />
            </div>
            <div class="carousel-item">
              <img src="photo/Jidlo2.jpg" class="d-block w-100" alt="Exotic Fruits" />
            </div>
            <div class="carousel-item">
              <img src="photo/Lampicky1.jpg" class="d-block w-100" alt="Exotic Fruits" />
            </div>
            <div class="carousel-item">
              <img src="photo/lampy1.jpeg" class="d-block w-100" alt="Exotic Fruits" />
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-mdb-target="#carouselExampleControls" data-mdb-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-mdb-target="#carouselExampleControls" data-mdb-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </section>

      <section id="rezervace" class="reserve-form">
        <h1><?php echo $t["reservation"]; ?></h1>

        <div class="form-main-box">
    <div class="form-segments">
        <form action="process_reservation.php" method="post" class="box">
            <div class="form-grid">
                <div class="form-group">
                    <p class="text1"><?php echo $t["date"]; ?></p>
                    <input type="date" id="event_date" name="event_date">
                </div>
                <div class="form-group">
                    <p class="text2"><?php echo $t["people"]; ?></p>
                    <select name="number_of_people" id="box2">
                        <?php for ($i = 2; $i <= 10; $i++) { ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <p class="text3"><?php echo $t["time"]; ?></p>
                    <select name="event_time" id="box3">
                        <?php for ($i = 11; $i <= 22; $i++) { ?>
                            <option value="<?php echo $i . ':00'; ?>"><?php echo $i . ':00'; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <p class="text4"><?php echo $t["duration"]; ?></p>
                    <select name="visit_duration" id="box4">
                        <option value="one-hour"><?php echo $t["one_hour"]; ?></option>
                        <option value="two-hour"><?php echo $t["two_hour"]; ?></option>
                        <option value="three-hour"><?php echo $t["three_hour"]; ?></option>
                        <option value="four-hour"><?php echo $t["four_hour"]; ?></option>
                    </select>
                </div>

                <div class="form-group">
                    <input type="text" name="full_name" placeholder="<?php echo $t["full_name"]; ?>">
                </div>
                <div class="form-group">
                    <input type="email" name="email" placeholder="<?php echo $t["email"]; ?>">
                </div>
                <div class="form-group">
                    <input type="phone" name="phone" placeholder="<?php echo $t["phone"]; ?>">
                </div>
                <div class="form-group full-width">
                    <textarea name="message" placeholder="<?php echo $t["message"]; ?>" cols="30" rows="4"></textarea>
                </div>
                <div class="form-group full-width">
                    <input type="submit" value="<?php echo $t["submit"]; ?>">
                </div>
            </div>
        </form>
    </div>
</div>


      </section>



    </main>




    <footer>
      <!-- kontakty -->
      <section>
        <div class="kontakt">
          <div class="cont">
            <div class="kontaktGrey">
              <h1><?php echo $t["contact"]; ?></h1>
              <div class="kontaktFlex">
                <div class="pataText">
                  <p><i class="fa-solid fa-map-pin"></i><b>Restaurant Lampičky</b>, Hartigova 173, Praha 3
                  </p>
                  <p><i class="fa-solid fa-phone"></i><?php echo $t["phone"]; ?>: +420 / 720 032 300</p>
                  <p><i class="fa-regular fa-envelope"></i><span> <?php echo $t["email"]; ?>:info@cafebarlampicky.cz</span></p>
                </div>
                <div class="pataText">
                  <p></p>
                </div>
                <div class="doba">
                  <p><b><?php echo $t["opening_hours"]; ?></b></p>
                  <p><b><?php echo $t["days_week"]; ?></b> 11h - 23h - <?php echo $t["kitchen"]; ?> 22:00 <?php echo $t["hours"]; ?></p>
                  <p><b><?php echo $t["days_weekend"]; ?></b> 11h - 00h - <?php echo $t["kitchen"]; ?> 22:00 <?php echo $t["hours"]; ?></p>
                </div>
              </div>
              <div class="karty">
                <p><?php echo $t["payment_cards"]; ?></p>
                <i class="fa-brands fa-cc-visa"></i>
                <i class="fa-brands fa-cc-mastercard"></i>
                <i class="fa-brands fa-paypal"></i>
              </div>
            </div>
          </div>

        </div>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2559.6708329882067!2d14.478384576014392!3d50.09244947152601!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x470b94860ee0a281%3A0x6e4dc425af6edecb!2zQ2Fmw6kgQmFyIExhbXBpxI1reQ!5e0!3m2!1scs!2scz!4v1697559159099!5m2!1scs!2scz" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

        <div class="socIcon">
          <a href="https://www.facebook.com/cafelampicky/" target="_blank">
            <i class="fa-brands fa-facebook"></i>
          </a>
          <a href="https://www.instagram.com/lampicky_restaurant/" target="_blank">
            <i class="fa-brands fa-instagram"></i>
          </a>
          <a href="https://linktr.ee" target="_blank">
            <i class="fa-solid fa-link"></i>
          </a>
        </div>

        <div class="copyright">
          <p>Copyright Lampičky restaurant 2025</p>
        </div>

    </footer>
    <?php include 'cookies.php'; ?>


    <!-- End your project here-->

    <!-- MDB -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <!-- Custom scripts -->
    <script type="text/javascript"></script>
    <script src="script.js" defer></script>
</body>

</html>