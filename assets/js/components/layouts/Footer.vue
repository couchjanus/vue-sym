<template>
  <!-- Footer-->
  <footer class="footer" style="background: #111111">
    <div class="py-5 text-white" style="background: #171717">
      <div class="container py-3">
        <div class="row gy-4">
          <div class="col-lg-4 border-lg-end border-dark">
            <div class="d-flex align-items-center justify-content-center justify-content-lg-start">

              <div class="ms-3">
                <h6 class="text-uppercase mb-0">Free shipping &amp; return</h6>
                <p class="text-muted text-sm mb-0">Free Shipping over $300</p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 border-lg-end border-dark">
            <div class="d-flex align-items-center justify-content-center">

              <div class="ms-3">
                <h6 class="text-uppercase mb-0">Money back guarantee</h6>
                <p class="text-muted text-sm mb-0">30 Days Money Back Guarantee</p>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="d-flex align-items-center justify-content-center">

              <div class="ms-3">
                <h6 class="text-uppercase mb-0">020-800-456-747</h6>
                <p class="text-muted text-sm mb-0">24/7 Available Support</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="py-5">
      <!-- Main Block -->
      <div class="container py-5">
        <div class="row gx-5 gy-4">
          <div class="col-lg-4">Shopaholic
            <p class="text-sm fw-normal">Lorem ipsum dolor sit amet, consectetur<br>adipisicing.</p>
            <ul class="list-inline mb-0">
              <li class="list-inline-item me-3"><a class="reset-anchor" href="#" target="_blank" title="twitter"><i class="fab fa-twitter"></i></a></li>
              <li class="list-inline-item me-3"><a class="reset-anchor" href="#" target="_blank" title="facebook"><i class="fab fa-facebook-f"></i></a></li>
              <li class="list-inline-item me-3"><a class="reset-anchor" href="#" target="_blank" title="instagram"><i class="fab fa-instagram"></i></a></li>
              <li class="list-inline-item me-3"><a class="reset-anchor" href="#" target="_blank" title="pinterest"><i class="fab fa-pinterest"></i></a></li>
              <li class="list-inline-item"><a class="reset-anchor" href="#" target="_blank" title="vimeo"><i class="fab fa-vimeo-v"></i></a></li>
            </ul>
          </div>
          <div class="col-lg-2 col-md-6">
            <h5 class="text-white text-uppercase mb-4">Shop</h5>
            <ul class="list-unstyled text-sm fw-normal mb-0">
              <li class="mb-1 pb-1"> <a class="reset-anchor" href="#">For Women</a></li>
              <li class="mb-1 pb-1"> <a class="reset-anchor" href="#">For Men</a></li>
              <li class="mb-1 pb-1"> <a class="reset-anchor" href="#">Stores</a></li>
              <li class="mb-1 pb-1"> <a class="reset-anchor" href="#">Our Blog</a></li>
              <li class="mb-1 pb-1"> <a class="reset-anchor" href="#">Shop</a></li>
            </ul>
          </div>
          <div class="col-lg-2 col-md-6">
            <h5 class="text-white text-uppercase mb-4">Company</h5>
            <ul class="list-unstyled text-sm fw-normal mb-0">
              <li class="mb-1 pb-1"> <a class="reset-anchor" href="#">Login</a></li>
              <li class="mb-1 pb-1"> <a class="reset-anchor" href="#">Register</a></li>
              <li class="mb-1 pb-1"> <a class="reset-anchor" href="#">Wishlist</a></li>
              <li class="mb-1 pb-1"> <a class="reset-anchor" href="#">Our Products</a></li>
              <li class="mb-1"> <a class="reset-anchor" href="#">Checkouts</a></li>
            </ul>
          </div>
          <div class="newsletter col-lg-4">
            <h5 class="text-white text-uppercase mb-4">Daily Offers &amp; Discounts</h5>
            <p class="text-sm fw-normal">Lorem ipsum dolor sit amet, consectetur adipisicing elit. At itaque temporibus.</p>
            <form action="#" id="newsletter-form">
              <div class="input-group mb-3 border">
                <input class="form-control bg-none border-0 shadow-0 text-white" type="text" placeholder="Your email address" aria-describedby="button-addon2">
                <div class="input-group-append text-muted">
                  <button class="btn btn-link reset-anchor" type="submit"><i class="fas fa-paper-plane"></i></button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="copyrights py-4" style="background: #0e0e0e">
      <div class="container py-3">
        <div class="row align-items-center gy-3">
          <div class="col-md-6">
            <p class="mb-0 text-sm fw-normal">&copy; 2021 <a class="reset-anchor" href="https://shopaholic.com" target="_blank">Shopaholic</a> All rights reserved.</p>
          </div>

          <div class="col-md-6">

          </div>
        </div>
      </div>
    </div>
  </footer>
</template>

<script>
export default {
  name: "FooterComponent"
}
</script>

<style scoped lang="scss">
 .footer{
   color: #aaaaaa;
 }
</style>