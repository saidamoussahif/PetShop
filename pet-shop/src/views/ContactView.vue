<template>
  <div class="contact">
    <NavBar />
    <section class="form-container">
      <form
        action=""
        methode="post"
        class="box"
        v-on:submit.prevent="ContactUs"
      >
        <h3>Send us message!</h3> 
        <input
          v-model="name"
          type="text"
          name="name"
          required
          placeholder="enter your name"
          maxlength="20"
          class="box"
        />

        <input
          v-model="number"
          type="number"
          name="number"
          required
          placeholder="enter your number"
          max="999999999999"
          min="0"
          class="box"
        />

        <input
          v-model="email"
          type="email"
          name="email"
          required
          placeholder="enter your email"
          maxlength="50"
          class="box"
        />

        <textarea
          v-model="message"
          name="message"
          required
          placeholder="enter your message"
          class="box"
          cols="20"
          rows="5"
        ></textarea>

        <input type="submit" class="btn" value="Send message" />

      </form>
    </section>
  </div>
  <FooterView />
</template>

<script>
  import axios from "axios";
  import NavBar from "../components/NavBar";
  import FooterView from "../components/FooterView";
  export default {
    name: "ContactView",
    components: {
      NavBar,
      FooterView,
    },
    data() {
      return {
        name: "",
        number: "",
        email: "",
        message: "",

      };
    },
    // mounted() {
    //   if (localStorage.getItem("login")) {
    //     this.$router.push("/DashboardView");
    //   }
    // },
    methods: {
      async ContactUs() {
        // const formData = new FormData();
        // formData.append("name", this.name);
        // formData.append("email", this.email);
        // formData.append("number", this.number);
        // formData.append("message", this.message);
        // console.log(formData);
        axios
          .post(
            "http://localhost/fil-rouge/pet-shop/Backend/ClientController/contactUs",{
              name: this.name,
              email: this.email,
              number: this.number,
              message: this.message,
            }
            
          )
          .then((Response) => {
            console.log(Response.data);
            if (Response.data.success) {
              this.$router.push("/");
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
  *::selection {
    background-color: #2980b9;
    color: rgb(255, 255, 255);
  }

  ::-webkit-scrollbar {
    height: 0.5rem;
    width: 1rem;
  }

  ::-webkit-scrollbar-track {
    background-color: transparent;
  }

  ::-webkit-scrollbar-thumb {
    background-color: #2980b9;
  }
  .contact {
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
    background-color: #333;
  }
  .btn {
    background-color: #f39c12;
    width: 100%;
    margin-top: 10px;
  }
  .delete-btn {
    background-color: #e74c3c;
  }
  .option-btn {
    background-color: #925b04;
  }

  .form-container {
    min-height: 90vh;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 20px;
  }
  .form-container form {
    width: 500px;
    border-radius: 5px;
    border: 0.1rem solid rgb(157, 157, 157);
    padding: 20px;
    text-align: center;
    background-color: #fff;
    margin-top: 3%;
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
</style>
