<footer class="footer">
  <div class="container">
    <div class="row">
      <div class="footer-col">
        <h4>mushalla</h4>
        <ul>
          <li><a href="#">Tentang</a></li>
          <li><a href="#">Informasi</a></li>
          <li><a href="#">Program</a></li>
          <li><a href="#">Berita</a></li>
        </ul>
      </div>
      <div class="footer-col">
        <h4>Bantuan</h4>
        <ul>
          <li><a href="pages/commingsoon.html">laporkan</a></li>
        </ul>
      </div>
      <div class="footer-col">
        <h4>Ikuti kami</h4>
        <div class="social-links">
          <a href="#"><i class="fab fa-whatsapp"></i></a>
          <a href="#"><i class="fa-brands fa-youtube"></i></a>
          <a href="#"><i class="fa-solid fa-envelope"></i></a>
        </div>
      </div>
      <div class="footer-col">
        <iframe width="300px" height="300px" style="border-radius: 10px" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d775.951174988634!2d101.48417434465107!3d0.4824556849637048!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d5ae54042443a7%3A0x45ff03ad5d11ada4!2sMushalla%20Al-Mauizhah!5e1!3m2!1sid!2sid!4v1750403618935!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
    </div>
    <!-- copyright moved outside of .row -->
    <div class="footer-bottom">
      <p id="copyright"></p>
    </div>
  </div>
</footer>

<script>
  const tahun = new Date().getFullYear();
  document.getElementById("copyright").innerHTML =
    `&copy; ${tahun} Zukri. All rights reserved.`;
</script>
