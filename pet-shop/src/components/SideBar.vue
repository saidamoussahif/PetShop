<template>
 <div class="home">
    <nav
     class="navbar navbar-expand-lg navbar-dark">
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
              <a class="nav-link text-dark link-r" href="/CategoryView"
                >Category</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link text-dark link-r" href ="/ProductView"
                >Products</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link list text-dark link-r" href="/MessageView"
                >Messages</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link list text-dark link-r" href="/OrdersView"
                >Orders</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link list text-dark link-r" href="/AccountsView"
                >Accounts</a
              >
            </li>  
             <li class="nav-item"    @click="logout">
              <a class="nav-link list text-dark link-r" href="/"
                >Logout</a
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
        // const data = JSON.parse(localStorage.getItem("login")).client;
        // console.log(data.firstname);
        // setTimeout(() => {
        //   this.firstName = data.firstname;
        //   this.isLoading =false;
        // }, 1000);
          //  this.firstName = data.firstname;
        // this.firstName = data.admin.firstname;
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