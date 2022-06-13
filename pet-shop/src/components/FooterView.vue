<template>
  <!-- Remove the container if you want to extend the Footer to full width. -->
  <div class="container">
    <!-- Footer -->
    <footer class="text-center text-lg-start text-dark">
         <!-- Section: Links  -->
      <section>
        <div class="container text-center text-md-start mt-5">
          <!-- Grid row -->
          <div class="row mt-3">
            <!-- Grid column -->
            <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
              <!-- Content -->
              <h6 class="text-uppercase fw-bold">About  Pet<span>Shop</span></h6>
              <hr
                class="mb-4 mt-0 d-inline-block mx-auto"
                style="width: 200px; background-color: #0d42a0; height: 2px"
              />
              <p>
                We offer all the best quality products and services for your
                adorable pets. Lorem ipsum dolor sit, amet consectetur
                adipisicing elit. Corporis, in non.
              </p>
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
              <!-- Links -->
              <h6 class="fw-bold">Services</h6>
              <hr
                class="mb-4 mt-0 d-inline-block mx-auto"
                style="width: 100px; background-color: #0d42a0; height: 2px"
              />
              <p>
                <a href="/PetProduct" class="text-dark">Pet Food</a>
              </p>
              <p>
                <a href="/PetProduct" class="text-dark">Pet Accessories</a>
              </p>
              <p>
                <a href="/PetProduct" class="text-dark">Pet Health</a>
              </p>
            </div>
            <!-- Grid column -->

            <!-- Grid column -->

            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
              <!-- Links -->
              <h6 class="fw-bold">Contact</h6>
              <hr
                class="mb-4 mt-0 d-inline-block mx-auto"
                style="width: 100px; background-color: #0d42a0; height: 2px"
              />
              <p><i class="fas fa-home mr-3"></i> Safi, 10012, Morocco</p>
              <p class="text-warning"><i class="fas fa-envelope mr-3"></i>PetShop@gmail.com</p>
              <p><i class="fas fa-phone mr-3"></i> + 212 5 234 567 88</p>
              <p><i class="fas fa-print mr-3"></i> + 212 6 234 567 89</p>
            </div>
            <!-- Grid column -->
          </div>
          <!-- Grid row -->
        </div>
      </section>
      <!-- Section: Links  -->

      <!-- Copyright -->
      <div class="text-center text-dark p-3" style="background-color: #fff">
        © 2022 Copyright:
        <a class="text-warning" href="https://Dentistiq.com/">PetShop.com</a>
      </div>
      <!-- Copyright -->
    </footer>
    <!-- Footer -->
  </div>
  <!-- End of .container -->
</template>
<script>
  export default {
    name: "FooterView",
    components: {},
  };
</script>

<style>
  .footer {
    background-color: rgb(219, 219, 219);
    margin-top: 15px;
  }
  section h6 span
   {
      font-family: 'poppins', sans-serif;
      /* font: bold; */
      color: #f29b12;
   }
    section h6 {
      font-size: 1.5rem;
    }
</style>
