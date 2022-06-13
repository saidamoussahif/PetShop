<template>
  <!-- Nav Bar -->
  <div class="home">
    <nav class="navbar navbar-expand-lg navbar-dark">
      <div class="container">
        <a class="navbar-brand text-dark" href="#">Pet<span>Shop</span></a>
        <!-- <img src="../assets/logo.png" style="width:100px;" alt=""> -->
        <button
          class="navbar-toggler btn-dark"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNav"
          aria-controls="navbarNav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse d-flex" id="navbarNav"> 
                <div class="mx-auto"></div>
          <ul class="navbar-nav first_nav">
           
            <li class="nav-item">
              <router-link class="nav-link text-dark link-r" to="/">
               home
                </router-link>
            </li>
            <li class="nav-item">
              <router-link class="nav-link text-dark link-r" to="/About">
             about
                </router-link>
            </li>
                <li class="nav-item">
              <div class="nav-link text-dark link-r">
                <div class="dropdown">
                  <a
                    class="btn dropdown-toggle"
                    type="button"
                    id="dropdownMenuButton1"
                    data-bs-toggle="dropdown"
                    aria-expanded="false"
                  >
                    Gallery
                  </a>
                  <ul
                    class="dropdown-menu"
                    aria-labelledby="dropdownMenuButton1"
                  >
                    <li v-for="category in categories" :key="category.id">
                      <a
                        class="nav-link text-dark link-r"
                        v-on:click="SettingCategoryName(category.name)"
                      >
                        {{ category.name }}
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </li>
          </ul>
          <div class="mx-auto"></div>
         
          <ul class="navbar-nav">
           
            <li class="nav-item">
              <router-link class="nav-link text-dark link-r" to="/AddToCart">
               <FIcons class="icon" :icon="['fas', 'shopping-cart']" />
                </router-link>
            </li>
            <li class="nav-item">
              <router-link class="nav-link text-dark link-r" to="/WishList">
               <FIcons class="icon" :icon="['fas', 'heart']" />
                </router-link>
            </li>
             <li class="nav-item">
              <router-link class="nav-link text-dark link-r" to="/"
                ><FIcons class="icon" :icon="['fas', 'user']"/>
                <!-- {{ client.firstName }}
                {{ client.lastName }} -->
                </router-link>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>
</template>

<script>
 import axios from "axios";
  export default {
    name: "ClientHeader",
    components: {},


       data() {
      return {
        cat: "",
        categories: [],
        // fisrtName: localStorage.getItem("fisrtName"),
        // lastName: localStorage.getItem("lastName"),
      };
    },
    mounted() {
      this.getCategories();
      // this.test();
 
      if (!localStorage.getItem("Login")) {
        this.$router.push("/");
      }
    },

    methods: {
        logout(){
      localStorage.removeItem('login');
      this.$router.push('/DashboardClient');
    },
      SettingCategoryName: function (name) {
        localStorage.setItem("TypeCategory", name);
        if (this.$route.name == "PetProduct") {
          this.$router.go();
        } else this.$router.push("/PetProduct");
      },
      getCategories: async function () {
        const response = await axios.get(
          "http://localhost/fil-rouge/pet-shop/Backend/CategoryController/read"
        );
        this.categories = response.data;
        console.log(response.data);
      },
    },
  
  };
</script>

<style scoped>
  .link-r {
    font-family: "poppins";
    font-size: 14px;
  }
  .nav-item:hover {
    text-decoration: underline;
  }

.nav-item .icon{
 font-size: 22px;
}
.nav-item .icon:hover{
  color: #f29b12;
}
  .container h4 {
    font-family: "poppins";
    font-weight: bold;
    color: rgb(5, 5, 5);
  }
  .container {
    margin-top: 10px;
    display: flex;
    justify-content: center;
    align-items: center;
  }
  .navbar-brand {
    font-weight: bold;
    font-size: 2.5rem;
    color: black;
  }
  .navbar-brand span {
    color: #f29b12;
  }
  .navbar-toggler {
    border: none;
  }
  .btn {
    padding: 0;
    color: #212529;
    font-size: 14px;
  }
  .dropdown-item {
    font-size: 14px;
    color: #212529;
  }

</style>
