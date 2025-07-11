<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Beranda</title>
  <link rel="stylesheet" href="css/footer.css">
  <link rel="stylesheet" href="css/public.css">
  <link rel="stylesheet" href="css/nav.css">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
  <link rel="icon" type="image/png" href="assets/favicon.png">
</head>
<body>
  <header>
    <?php include "./component/nav.php" ?>
  </header>


  <main>
    <h1 class="main-tittle">Mushalla Al-Mauizah</h1>
    <div class="img-wrapper">
      <img src="./assets/img1.png" alt="" class="img" width="100%" height="100px">
      <img src="./assets/img2.png" alt="" class="img" width="100%" height="100px">
      <img src="./assets/img3.png" alt="" class="img" width="100%" height="100px">
    </div>

    <div class="jam">
      <p id="clock"></p>
    </div>

    <div class="divider">
      <p class="text">Tentang Mushalla Al Mauizah</p>
    </div>
    <div class="tentang">    
      <div class="maps">
        <a href="https://www.google.com/maps/place/Mushalla+Al-Mauizhah/@0.4824299,101.4820936,17z/data=!3m1!4b1!4m6!3m5!1s0x31d5ae54042443a7:0x45ff03ad5d11ada4!8m2!3d0.4824245!4d101.4846685!16s%2Fg%2F11c6ddj4m_?hl=en-US&entry=ttu&g_ep=EgoyMDI1MDYwNC4wIKXMDSoASAFQAw%3D%3D" target="_blank" class="maps-icon">
          <i class="fa-solid fa-location-dot maps-icon"></i>
        </a>
      </div>
    </div>
  </main>

  <footer>
    <?php include "component/footer.php" ?>
  </footer>
  
  <script src="js/clock.js"></script>
</body>
</html>
