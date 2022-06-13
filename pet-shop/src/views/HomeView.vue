<template>
  <div class="home">
    <NavBar />
    <div class="parent-div">
      <div>
        <img src="../assets/s1-1920x750.jpg" class="img-fluid" alt="" />
      </div>
      <div class="first-p">
        <h1>We take care of your pets</h1>
        <p>
          We offer all the best quality products and services for your adorable
          pets. Lorem ipsum dolor sit, amet consectetur adipisicing elit.
          Corporis, in non.
        </p>
        <a
          class="btn text-light"
          style="background-color: #f29b12"
          href="/PetProduct"
          >Show More</a
        >
      </div>
    </div>

    <section class="gallerie">
      <div class="container">
        <div class="carte">
          <img src="../assets/health.png" />
          <div class="description">
            <h4>Pet accessories</h4>
            <br />
            <p>Discover our Pet Shop and Services Discover our Pet Shop and</p>
          </div>
        </div>

        <div class="carte">
          <img src="../assets/food.png" />
          <div class="description">
            <h4>Pet accessories</h4>
            <br />
            <p>Discover our Pet Shop and Services Discover our Pet Shop and</p>
          </div>
        </div>

        <div class="carte">
          <img src="../assets/pet-Access.png" />
          <div class="description">
            <h4>Pet accessories</h4>
            <br />
            <p>Discover our Pet Shop and Services Discover our Pet Shop and</p>
          </div>
        </div>
      </div>
    </section>

    <!-- *************************************************************************************** -->
    <section id="call-to-action">
      <div class="container dog-content">
        <img src="../assets/adopt.png" class="img-dog" alt="" />
        <div class="text-content text-dark text-center">
          <h4 class="title m-5">Discover our Pet Shop and Services</h4>
          <p class="text-center">
            Contact or learn more about us and make your pet happy in your visit
            to our Shop and discover all our amazing products and services to
            make your pet very healthy and active with a lot of energy this
            winter lorem ipsum ipsuet dolor.
          </p>
        </div>
      </div>
    </section>
    <!-- *************************************************************************************** -->
    <div class="wp-container-62a7382107e30 wp-block-group our-beliefs">
      <div class="wp-block-group__inner-container">
        <!-- <h2 class="has-text-align-center" id="the-wellie-way">
          The Wellie Way
        </h2> -->
        <!-- *************************************************************************************** -->
        <div class="wp-block-columns">
          <div class="wp-block-column">
            <div class="wp-block-image">
              <figure class="aligncenter size-full">
                <img
                  loading="lazy"
                  width="67"
                  height="67"
                  src="https://www.wellnesspet.com/wp-content/uploads/2022/04/obsessed.png"
                  alt=""
                  class="wp-image-1198"
                />
              </figure>
            </div>

            <h3 class="has-text-align-center" id="obsessed">Obsessed</h3>

            <p class="has-text-align-center">
              It’s who we are and<br />
              we win for pets<br />
              and their parents.
            </p>
          </div>

          <div class="wp-block-column">
            <div class="wp-block-image">
              <figure class="aligncenter size-full">
                <img
                  loading="lazy"
                  width="67"
                  height="67"
                  src="https://www.wellnesspet.com/wp-content/uploads/2022/04/wellies.png"
                  alt=""
                  class="wp-image-1199"
                />
              </figure>
            </div>

            <h3 class="has-text-align-center" id="wellies">Wellies</h3>

            <p class="has-text-align-center">
              Each of us <br />make a difference<br />every day.
            </p>
          </div>

          <div class="wp-block-column">
            <div class="wp-block-image">
              <figure class="aligncenter size-full">
                <img
                  loading="lazy"
                  width="67"
                  height="67"
                  src="https://www.wellnesspet.com/wp-content/uploads/2022/04/winning.png"
                  alt=""
                  class="wp-image-1200"
                />
              </figure>
            </div>

            <h3 class="has-text-align-center" id="winning">Winning</h3>

            <p class="has-text-align-center">
              Together, <br />we are <br />unstoppable.
            </p>
          </div>

          <div class="wp-block-column">
            <div class="wp-block-image">
              <figure class="aligncenter size-full">
                <img
                  loading="lazy"
                  width="67"
                  height="67"
                  src="https://www.wellnesspet.com/wp-content/uploads/2022/04/world.png"
                  alt=""
                  class="wp-image-1201"
                />
              </figure>
            </div>

            <h3 class="has-text-align-center" id="for-the-world">
              For the World
            </h3>

            <p class="has-text-align-center">
              We are building a<br />better tomorrow for<br />pets, their
              parents, and the world.
            </p>
          </div>
        </div>
      </div>
    </div>

    <!-- *************************************************************************************** -->

    <section id="call-to-action">
      <h4 class="title m-5">Our brands</h4>
      <div class="container dog-content">
        <div class="text-content text-dark text-center">
          <p class="brand">
            At Wellness Pet, we fulfill a life of wellbeing together with pets.
            From our high-quality, natural meals and tasty treats, to our dental
            chews that help maintain dental health,we are proud to be a team of
            caring professionals who bring joy, love, and wellbeing to pets and
            their parents.
          </p>
          
        </div>
      </div>
    </section>

  </div>
  <FooterView />
</template>

<script>
  import FooterView from "../components/FooterView";
  import NavBar from "../components/NavBar";
  export default {
    name: "HomeView",
    components: {
      NavBar,
      FooterView,
    },
  };
</script>

<style scoped>
  * {
    font-family: "Nunito", sans-serif;
    box-sizing: border-box;
    outline: none;
    border: none;
    text-decoration: none;
  }
  .home {
    background-color: #f1f1f1;
  }
  .parent-div {
    position: relative;
  }
  .first-p {
    position: absolute;
    top: 30%;
    left: 7%;
    color: rgb(0, 0, 0);
    text-align: left;
    width: 50%;
  }
  .first-p h1 {
    color: #f29b12;
    font-weight: bold;
  }
  section {
    display: flex;
    flex-direction: column;
    padding: 20px;
  }
  section h3 {
    font-size: 30px;
    text-align: center;
    text-transform: capitalize;
    margin-top: 20px;
    margin-bottom: 20px;
  }

  .gallerie .container .carte {
    background-color: #fff;
    display: flex;
    flex-direction: column;
    align-items: center;
    border: rgb(107, 107, 107) solid 1px;
    padding: 20px;
    margin: 20px;
    border-radius: 10px;
  }
  .carte img {
    border-radius: 10px;
    width: 100%;
    height: 100%;
    object-fit: cover;
  }
  .carte img:hover {
    transform: scale(1.1);
    transition: all 1.5s ease;
  }
  .carte:hover img {
    transform: scale(1.1);
  }
  .description h4 {
    text-align: center;
    margin: 20px auto;
    color: rgb(88, 109, 216);
  }

  #call-to-action .dog-content {
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #ffffff;
    padding: 20px;
    margin: 20px;
    border-radius: 10px;
  }
  .img-dog {
    width: 25%;
    height: auto;
  }
  #call-to-action {
    padding: 20px;
    margin-top: 20px;
  }
  #call-to-action .title {
    text-align: center;
    color: #f29b12;
    font-weight: bold;
    font-size: 30px;
  }

  @media screen and (min-width: 760px) {
    .gallerie .container {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
    }
    .gallerie .container {
      gap: 10px;
    }
  }
  @media (max-width: 768px) {
    .img-fluid {
      display: none;
    }
    .container {
      margin-top: 300px;
    }
    .first-p {
      width: 90%;
    }
    #call-to-action .img-dog {
      margin-top: 100px;
      display: none;
    }
    .wp-block-columns {
      flex-direction: column;
    }
  }

  .our-beliefs {
    background-color: #ffcf77;
    background-image: linear-gradient(
        to top,
        rgba(255, 255, 255, 0.5) 100%,
        rgba(244, 244, 244, 0.5) 100%
      ),
      url(../assets/paws-our-beliefs.png);
    background-size: 100%;
    background-position: 18% 50%;
    background-repeat: no-repeat;
    padding: 9%;
  }
  .our-beliefs .wp-block-columns {
    text-align: center;
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  .our-beliefs #the-wellie-way p {
    font-size: 20px;
    color: #fff;
    margin-top: 20px;
  }
  .our-beliefs h3 {
    color: #f29b12;
    font-size: 32px;
    font-weight: bold;
  }
  #call-to-action .brand {
    margin-top: 20px;
    width: 50%;
    text-align: center;
    margin-left: 18rem;
  }
 
</style>
