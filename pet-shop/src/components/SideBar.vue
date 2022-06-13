<template>
 <div class="home">
    <nav class="navbar navbar-expand-lg navbar-dark">
      <div class="container">
  <a class="navbar-brand text-dark" href="/DashboardView">Admin <span>Panel</span></a>
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
 
        <div class="collapse navbar-collapse" id="navbarNav">
          <div class="mx-auto"></div>
          <ul class="navbar-nav">
            <li class="nav-item">
              <router-link class="nav-link text-dark link-r" to="/CategoryView"
                >Category</router-link
              >
            </li>
            <li class="nav-item">
              <router-link class="nav-link text-dark link-r" to ="/ProductView"
                >Products</router-link
              >
            </li>
            <li class="nav-item">
              <router-link class="nav-link list text-dark link-r" to="/MessageView"
                >Messages</router-link
              >
            </li>
            <li class="nav-item">
              <router-link class="nav-link list text-dark link-r" to="/OrdersView"
                >Orders</router-link
              >
            </li>
            <li class="nav-item">
              <router-link class="nav-link list text-dark link-r" to="/AccountsView"
                >Accounts</router-link
              >
            </li>  
             <li class="nav-item"  v-if="isLoggedIn"  @click="logout">
              <router-link class="nav-link list text-dark link-r" to="/"
                >Logout</router-link
              >
            </li>     
          </ul>
        </div>
      </div>
    </nav>
  </div>
</template>
<script>
export default {
     name: 'SideBar',
  components: {},
  data() {
    return {
       isLoggedIn: false,
        firstName:"", 
       
    };
  },
   mounted() {
      // if (!localStorage.getItem("login")) {
      //   this.$router.push("/");
      // },
       if (localStorage.getItem("login")) {
        const data = JSON.parse(localStorage.getItem("login"));
        this.firstName = data.admin.firstname;
        this.isLoggedIn = true;
      }
    },
  methods: {
     logout(){
      localStorage.removeItem('login');
      this.isLoggedIn = false;
      this.$router.push('/');
    },
  },
 
  
}
</script>
<style scoped>

 .link-r {
    font-family: "poppins";
    font-size: 14px;
  }
  .nav-item:hover {
    text-decoration: underline;
  }

  .container h4 {
    font-family: "poppins";
    font-weight: bold;
    color: rgb(5, 5, 5);
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
  .nav-item .icon{
 font-size: 22px;
  color: #f29b12;
}
.nav-item .icon:hover{
  color: #181818;
}
</style>