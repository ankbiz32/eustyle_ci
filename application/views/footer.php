<footer class="footer" id="contact">
        <div class="container">
          <div class="footer__top row">
            <div class="col-md-6 col-12">
              <div class="footer__appeal">
                Kick-start your dream with Eustyle Interiors.
              </div>
              <div class="footer__appeal">
                Start by <a><span>saying hi</span></a>
              </div>
            </div>
            <div class="col-12 col-md-6">
              <form  class="contacts-parallax__feedback feedback-form js-form-validate" action="<?=base_url()?>submit" method="post" >
                <label
                  class="contacts-parallax__field field field--bordered"
                  aria-label="Your name"
                >
                  <input
                    type="text"
                    name="email"
                    placeholder=""
                    hidden
                  />
                  <input
                    type="text"
                    name="name"
                    placeholder="Your name *"
                    required
                  />
                </label>
                <div class="field-error" style="display: none"></div>
                <br />

                <label
                  class="contacts-parallax__field field field--bordered"
                  aria-label="Email Address"
                >
                  <input
                    type="email"
                    name="some_info_for_sending_this_msg"
                    placeholder="Email Address *"
                    required
                  />
                </label>
                <div class="field-error" style="display: none"></div>
                <br />

                <label
                  class="contacts-parallax__field field field--bordered"
                  aria-label="Your Message"
                >
                  <textarea
                    name="message"
                    placeholder="Your Message *"
                    required
                  ></textarea>
                </label>
                <div class="field-error" style="display: none"></div>
                <?php if($this->session->flashdata('failed')){?>
                  <div class="field-error"><?= $this->session->flashdata('failed')?></div>
                  <br />
                <?php } ?>
                <?php if($this->session->flashdata('success')){?>
                  <div class="field-success"><?= $this->session->flashdata('success')?></div>
                  <br />
                <?php } ?>
                <button class="contacts-parallax__btn btn" type="button">
                  Send Message
                </button>
              </form>
            </div>
          </div>
          <div class="footer__middle row">
            <!-- Footer contacts-->
            <div class="footer__column col-12 col-md">
              <div class="footer__column-title">Principle Architect</div>
              <p class="footer__address">Archana Chinagi</p>
              <address class="footer__address">
                <a class="text-white" href="mailto:<?= $web->email ?>"><?= $web->email ?></a>
              </address>
              <a class="footer__phone" href="tel:+91<?= $web->phone1 ?>">+91 - <?= $web->phone1 ?></a>
            </div>
            <div class="footer__column col-12 col-md">
              <div class="footer__column-title">Business Manager</div>
              <p class="footer__address">Abhishek Chinagi</p>
              <address class="footer__address">
                <a class="text-white" href="mailto:<?= $web->email ?>"><?= $web->email ?></a>
              </address>
              <a class="footer__phone" href="tel:+91<?= $web->phone2 ?>">+91 - <?= $web->phone2 ?></a>
            </div>
            <div class="footer__column col-12 col-sm">
              <div class="footer__column-title">Quick Links</div>
              <!-- Footer menu-->
              <ul class="footer__column-menu">
                <li class="footer__column-item">
                  <a class="footer__column-link" href="#about"
                    >About</a
                  >
                </li>
                <li class="footer__column-item">
                  <a class="footer__column-link" href="#works"
                    >Works</a
                  >
                </li>
                <li class="footer__column-item">
                  <a class="footer__column-link" href="#"
                    >T&C</a
                  >
                </li>
              </ul>
            </div>
            <div class="footer__column footer__column col-12 col-lg">
              <!-- Social-->
              <ul class="footer__social social">
                <li class="social__item">
                  <a class="social__link" href="<?=$web->fblink?>" target="_blank">
                    <svg width="18" height="18" aria-label="facebook icon">
                      <use xlink:href="#facebook"></use>
                    </svg>
                    <span class="visually-hidden">Facebook</span>
                  </a>
                </li>
                <li class="social__item">
                  <a class="social__link" href="<?=$web->instalink?>" target="_blank">
                    <svg width="18" height="18" aria-label="instagram icon">
                      <use xlink:href="#instagram"></use>
                    </svg>
                    <span class="visually-hidden">Instagram</span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
          <div class="row">
            <!-- Copyrights-->
            <div class="footer__copyright col-12 col-sm-6">
              © 2021 <span>Eustyle Interiors</span> All Rights Reserved
            </div>
            <div class="footer__design col-12 col-sm-6">
              Developed by <span><a href="https://aller.in" target="_blank" class="text-white">Aller Technologies</a></span>
            </div>
          </div>
        </div>
      </footer>
      <video id="ourStory" controls style="display: none">
        <source src="<?=base_url()?>assets/video/liarch.mp4" type="video/mp4" />
      </video>
      <!-- Popup thanks-->
      <section class="popup popup--thanks" id="thanks" style="display: none">
        <div class="popup__title">Thanks!</div>
      </section>
    </div>
    <!-- Optional JavaScript-->
    <script src="<?=base_url()?>assets/js/jquery-3.5.1.min.js"></script>
    <script src="<?=base_url()?>assets/js/jquery.fancybox.min.js"></script>
    <!-- <script src="<?=base_url()?>assets/js/jquery.pagepiling.js"></script> -->
    <script src="<?=base_url()?>assets/js/aos.js"></script>
    <script src="<?=base_url()?>assets/js/jquery.easy_number_animate.js"></script>
    <script src="<?=base_url()?>assets/js/isotope.pkgd.min.js"></script>
    <!-- <script src="<?=base_url()?>assets/js/packery-mode.pkgd.min.js"></script> -->
    <script src="<?=base_url()?>assets/js/swiper-bundle.min.js"></script>
    <script src="<?=base_url()?>assets/js/animsition.min.js"></script>
    <!-- JavaScript-->
    <script src="<?=base_url()?>assets/js/main.js"></script>
    <script>
       $(function(){   
            $('.readmore .more').on('click', function(){
                var $parent = $(this).parent();
                if($parent.data('visible')) {
                    $parent.data('visible', false)
                    .find('.moreText').fadeOut()
                    .end().find('.more').text('Show more +');
                } else {
                    $parent.data('visible', true)
                    .find('.moreText').fadeIn()
                    .end().find('.more').text('Show less -');
                }
            });
        });
    </script>
  </body>
</html>
