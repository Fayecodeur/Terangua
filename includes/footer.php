      <!-- footer starts  -->
      <footer class="site-footer" id="contact">
          <div class="top-footer section">
              <div class="sec-wp">
                  <div class="container">
                      <div class="row">
                          <div class="col-lg-4">
                              <div class="footer-info">
                                  <div class="footer-logo">
                                      <a href="index.html">
                                          <img src="logo.png" alt="" />
                                      </a>
                                  </div>
                                  <p>
                                      Utilisez notre système de réservation en ligne pour
                                      réserver une table rapidement et facilement.
                                  </p>
                                  <div class="social-icon">
                                      <ul>
                                          <li>
                                              <a href="#">
                                                  <i class="uil uil-facebook-f"></i>
                                              </a>
                                          </li>
                                          <li>
                                              <a href="#">
                                                  <i class="uil uil-instagram"></i>
                                              </a>
                                          </li>
                                          <li>
                                              <a href="#">
                                                  <i class="uil uil-youtube"></i>
                                              </a>
                                          </li>
                                      </ul>
                                  </div>
                              </div>
                          </div>
                          <div class="col-lg-8">
                              <div class="footer-flex-box">
                                  <div class="footer-table-info">
                                      <h3 class="h3-title">Heures d'ouverture</h3>
                                      <ul>
                                          <li>
                                              <i class="uil uil-clock"></i> Lun-Ven : 8 h - 22h
                                          </li>
                                          <li>
                                              <i class="uil uil-clock"></i> Sam-Dim : 11h - 20h
                                          </li>
                                      </ul>
                                  </div>
                                  <div class="footer-menu food-nav-menu">
                                      <h3 class="h3-title">Pages</h3>
                                      <ul class="column-2">
                                          <?php if (!isset($_SESSION["user"])) : ?>
                                              <li><a href="index">Acceuil</a></li>
                                              <li><a href="connexion">Connéxion</a></li>
                                              <li><a href="inscription">Inscription</a></li>
                                          <?php else : ?>
                                              <li><a href="acceuil">Acceuil</a></li>
                                              <li><a href="menu">Nos Menu</a></li>
                                              <li><a href="equipe">Notre équipe</a></li>
                                              <li><a href="reservation">Resérvation</a></li>
                                              <li><a href="logout">Deconnexion</a></li>
                                          <?php endif; ?>
                                      </ul>
                                  </div>
                                  <div class="footer-menu">
                                      <h3 class="h3-title">Contact</h3>
                                      <ul>
                                          <li>Localisation :</li>
                                          <li>Numéro téléphone :</li>
                                          <li>Adresse email :</li>
                                      </ul>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="bottom-footer">
              <div class="container">
                  <div class="row">
                      <div class="col-lg-12 text-center">
                          <div class="copyright-text">
                              <p>
                                  Copyright &copy; 2024 Téranga Délice. Tous droits
                                  réservés.
                                  <span class="name">semestre 6</span>
                              </p>
                          </div>
                      </div>
                  </div>
                  <button class="scrolltop">
                      <i class="uil uil-angle-up"></i>
                  </button>
              </div>
          </div>
      </footer>
      </div>
      </div>

      <!-- jquery  -->
      <script src="assets/js/jquery-3.5.1.min.js"></script>
      <!-- bootstrap -->
      <script src="assets/js/bootstrap.min.js"></script>
      <script src="assets/js/popper.min.js"></script>

      <!-- fontawesome  -->
      <script src="assets/js/font-awesome.min.js"></script>

      <!-- swiper slider  -->
      <script src="assets/js/swiper-bundle.min.js"></script>

      <!-- mixitup -- filter  -->
      <script src="assets/js/jquery.mixitup.min.js"></script>

      <!-- fancy box  -->
      <script src="assets/js/jquery.fancybox.min.js"></script>

      <!-- parallax  -->
      <script src="assets/js/parallax.min.js"></script>

      <!-- gsap  -->
      <script src="assets/js/gsap.min.js"></script>

      <!-- scroll trigger  -->
      <script src="assets/js/ScrollTrigger.min.js"></script>
      <!-- scroll to plugin  -->
      <script src="assets/js/ScrollToPlugin.min.js"></script>
      <!-- rellax  -->
      <!-- <script src="assets/js/rellax.min.js"></script> -->
      <!-- <script src="assets/js/rellax-custom.js"></script> -->
      <!-- smooth scroll  -->
      <script src="assets/js/smooth-scroll.js"></script>
      <!-- custom js  -->
      <script src="assets/js/main.js"></script>
      </body>

      </html>