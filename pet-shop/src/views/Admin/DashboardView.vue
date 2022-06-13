<template>
  <div class="dash">
    <SideBar />
    <section class="dashboard">
      <div class="box">
        <h3 class="text-center">welcome!</h3>
      </div>

      <div class="box-container">
        <div class="box" >
          <h5>Categories</h5>
          <p>completed categories</p>
          <a href="/CategoryView" class="btn">See categories</a>
        </div>

        <div class="box">
          <h5>number of product</h5>
          <p>orders placed</p>
          <a href="/ProductView" class="btn">See products</a>
        </div>

        <div class="box">
          <h5>Number of messages</h5>
          <p>products added</p>
          <a href="/MessageView" class="btn">See messages</a>
        </div>

        <div class="box">
          <h5>number of users</h5>
          <p>normal users</p>
          <a href="/OrdersView" class="btn">See orders</a>
        </div>

        <div class="box">
          <h5>number of message</h5>
          <p>new messages</p>
          <a href="/AccountsView" class="btn">See users</a>
        </div>
        <div class="box">
          <h5>number of message</h5>
          <p>new messages</p>
          <a href="/MessageView" class="btn">See messages</a>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
  import axios from "axios";
  import SideBar from "@/components/SideBar.vue";
  export default {
    name: "DashboardView",
    components: {
      SideBar,
    },
    data() {
      return {
        categories: "",
      };
    },
    mounted() {
      this.getCategories();
    },
    methods: {
      getCategories: async function () {
        const response = await axios.get(
          "http://localhost/fil-rouge/pet-shop/Backend/CategoryController/countCategory"
        );
        this.categories = response.data;
      },
    },
  };
</script>

<style scoped>
  section {
    padding: 2rem;
    max-width: 1200px;
    margin: 0 auto;
    /* border: rgb(177, 177, 177) solid 1px; */
    border-radius: 10px;
  }
  .dash {
    background-color: #f5f5f5;
    min-height: 100vh;
  }

  .box-container .box {
    background: rgb(255, 255, 255);
    padding: 2rem;
    border: rgb(177, 177, 177) solid 1px;
    border-radius: 10px;
    margin-bottom: 2rem;
    text-align: center;
  }
  .dashboard .box h5{
    /* background: rgb(233, 233, 233); */
    padding: 2rem;
    /* border: rgb(0, 0, 0) solid 1px; */
    border-radius: 10px;
    margin-bottom: 2rem;
    text-align: center;
  }
  .box-container .box h5 {
    color: rgb(87, 136, 235);
    margin-bottom: 2rem;
    font-family: Arial, Helvetica, sans-serif;
    font-weight: bold;
    text-transform: capitalize;
  }
  .box-container .box p {
    font-size: 1.2rem;
    color: #444;
    margin-bottom: 2rem;
  }
  .box-container .box a {
    background: #f39c12;
    color: #ffffff;
    padding: 0.5rem;
    border-radius: 5px;
    text-decoration: none;
    font-size: 1rem;
  }
  .box-container .box a .icon {
    margin-left: 0.5rem;
    color: #000000;
  }

  @media screen and (min-width: 760px) {
    .box-container .box {
      width: 30%;
      display: inline-block;
      grid-template-columns: repeat(3, 1fr);
      margin: 1rem;
    }
    
  }
</style>
