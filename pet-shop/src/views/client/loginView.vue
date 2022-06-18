<template>
  <div class="login">
    <div class="form-container">
      <form action="" methode="post"  v-on:submit.prevent="Login">
        <h3>Login now</h3>
        <input
          v-model="email"
          type="email"
          name="email"
          required
          placeholder="enter email"
          class="box"
        />
        <input
         v-model="password"
          type="password"
          name="password"
          required
          placeholder="enter password"
          class="box"
        />
        <input type="submit" name="submit" class="btn" value="Login now" />
        <p>Don't have an account? <a href="/SignUp">register Now</a></p>
      </form>
    </div>
  </div>

  <!-- <FooterView /> -->
</template>

<script>
  // import NavBar from '../components/NavBar'
  // import FooterView from "../components/FooterView";
  import axios from "axios";
  export default {
    name: "loginView",
    components: {},
    
    data() {
      return {
        email: "",
        password: "",
      };
    },
     mounted() {
      if (localStorage.getItem("login")) {
        this.$router.push("/");
      }
    },
    methods: {
     async Login() {
        const formData = new FormData();
        formData.append("email", this.email);
        formData.append("password", this.password);
        axios
          .post(
            "http://localhost/fil-rouge/pet-shop/Backend/ClientController/login",
            formData
          )

            .then((Response) => {
              console.log(Response.data);
          if (Response.data.success){
          localStorage.setItem("login", JSON.stringify(Response.data));
           this.$router.push({ name: "/" });
          } else {
            alert(Response.data.error);
          }
        })

          .then((Response) => { 
            console.log(Response.data); 

            if (Response.data.success) {
             this.$router.push({ name: "/" });
            } else {
              alert(Response.data.error);
            }
          });
      },
    },
  };
</script>

<style scoped>
  * {
    font-family: "Nunito", sans-serif;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    outline: none;
    border: none;
    text-decoration: none;
  }
  /* *::selection {
    background-color: #2980b9;
    color: rgb(255, 255, 255);
  } */
/* 
  ::-webkit-scrollbar {
    height: 0.5rem;
    width: 1rem;
  }

  ::-webkit-scrollbar-track {
    background-color: transparent;
  }

  ::-webkit-scrollbar-thumb {
    background-color: #2980b9;
  } */
  .login {
    background-color: #eee;
  }
  .btn,
  .delete-btn,
  .option-btn {
    display: inline-block;
    padding: 10px 30px;
    cursor: pointer;
    font-size: 18px;
    color: #fff;
    border-radius: 5px;
    text-transform: capitalize;
  }
  .btn:hover,
  .delete-btn:hover,
  .option-btn:hover {
    background-color: #af6e05;
  }
  .btn {
    background-color: #f39c12;
    margin-top: 10px;
  }
  .delete-btn {
    background-color: #e74c3c;
  }
  .option-btn {
    background-color: #f39c12;
  }

  .form-container {
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 20px;
  }
  .form-container form {
    width: 500px;
    border-radius: 5px;
    border: 0.1rem solid rgb(151, 151, 151);
    padding: 20px;
    text-align: center;
    background-color: #fff;
    margin-top: 20px;
    font-size: 20px;
    color: #333;
  }
  .form-container form h3 {
    font-size: 30px;
    margin-bottom: 10px;
    text-transform: uppercase;
    color: #333;
  }

  .form-container form .box {
    width: 100%;
    border-radius: 5px;
    border: 0.1rem solid rgb(157, 157, 157);
    padding: 12px 14px;
    font-size: 18px;
    margin: 10px 0;
  }

  .form-container form p {
    margin-top: 20px;
    font-size: 20px;
    color: #333;
  }
  .form-container form p a {
    color: #e74c3c;
  }
  .form-container form p a:hover {
    text-decoration: underline;
  }
</style>
