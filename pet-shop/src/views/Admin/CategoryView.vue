<template>
  <SideBar />
 
  <div class="menu">
    <div class="container">
      <h2>List of categories</h2>
       <div class="col-2">
    <router-link
      data-bs-toggle="modal"
      data-bs-target="#addCategory"
      class="btn add_category"
      style="
        width: 137px;
        background-color: rgb(88, 109, 216);
        border-color: #fff;
        color: #fff;
      "
      :to="{ path: '/AddProduct' }"
      >Add Category</router-link
    >
  </div>
      <ul class="responsive-table">
        <li class="table-header">
          <div class="col col-1">Name</div>
          <div class="col col-1">Action</div>
        </li>
        <li class="table-row" v-for="category in categories" :key="category.id">
          <div
            class="col col-1"
            style="width=100%;"
            data-label="Customer Name :"
          >
            <div>{{ category.name }}</div>
          </div>
          <div
            class="col col-1"
            style="width='100%'"
            data-label="Payment Status">
            <!-- <button class="btn edit">
              <FIcons :icon="['fa', 'edit']" />
            </button> -->
            <button class="btn delete" @click="del(category.id)">
              <FIcons :icon="['fas', 'trash']" />
            </button>
          </div>
        </li>
      </ul>
    </div>
    <EditCategory />
    <AddCategory />
  </div>
</template>

<script>
  import axios from "axios";
  import SideBar from "@/components/SideBar.vue";
  import AddCategory from "@/components/AddCategory.vue";
  import EditCategory from "@/components/EditCategory.vue";
  export default {
    name: "CategoryView",
    components: {
      SideBar,
      EditCategory,
      AddCategory,

    },
    data() {
      return {
        categories: [],
      };
    },
    mounted() {
      this.getCategories();
    },
    methods: {
      getCategories: async function () {
        const response = await axios.get(
          "http://localhost/fil-rouge/pet-shop/Backend/CategoryController/read"
        );
        this.categories = response.data;
      },
      async del(id) {
        console.log(id);

        const response  = await fetch(
          "http://localhost/fil-rouge/pet-shop/Backend/CategoryController/delete/" +
            id,
          {
            method: "POST",
          }
        );
        const data = await response.json();
        console.log(data);
        this.$router.push("/CategoryView");
        this.getCategories();
      },
    },
  };
</script>

<style scoped>
  .menu {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-left: 2rem;
  }
  .add_category {
    background-color: rgb(88, 109, 216);
    color: #fff;
    border-color: #f1f1f1;
    margin-bottom: 1rem;
    border-radius: 5px;
    font-family: "Roboto", sans-serif;
    margin-left: 52rem;
    width: 147px;
  }
  .add_category:hover {
    background-color: rgb(50, 73, 189);
  }
  .col-lg-9 {
    position: absolute;
    top: 20%;
    left: 10%;
    display: flex;
    width: 900px;
    z-index: 10;
    justify-content: end;
  }

  .container {
    max-width: 1000px;
    margin-left: auto;
    margin-right: auto;
    padding-left: 10px;
    padding-right: 10px;
  }
  h2 {
    font-size: 26px;
    margin: 20px 0;
    text-align: center;
  }
  h2 small {
    font-size: 0.5em;
  }
  .responsive-table li {
    border-radius: 3px;
    padding: 25px 30px;
    display: flex;
    justify-content: space-between;
    margin-bottom: 25px;
    align-items: center;
  }
  .responsive-table .table-header {
    background-color: rgb(88, 109, 216);
    font-size: 14px;
    text-transform: uppercase;
    letter-spacing: 0.03em;
  }
  .responsive-table .table-row {
    background-color: #fff;
    box-shadow: 0px 0px 9px 0px rgba(0, 0, 0, 0.1);
  }
  .responsive-table .col-1 {
    flex-basis: 10%;
  }
  .col .edit {
    color: #fff;
    background-color: #00c851;
    border-radius: 3px;
    padding: 5px;
    margin-right: 10px;
  }
  .col .delete {
    color: #fff;
    background-color: #f44336;
    border-radius: 3px;
    padding: 5px;
    margin-right: 10px;
  }
  .col .edit:hover {
    text-decoration: none;
    color: #fff;
    background-color: #048e0d;
    border-radius: 3px;
    padding: 5px;
    margin-right: 10px;
    cursor: pointer;
  }
  .col .delete:hover {
    text-decoration: none;
    color: #fff;
    background-color: #a30606;
    border-radius: 3px;
    padding: 5px;
    margin-right: 10px;
    cursor: pointer;
  }

  @media all and (max-width: 767px) {
    .responsive-table .table-header {
      display: none;
    }
    .responsive-table li {
      display: block;
    }
    .responsive-table .col {
      flex-basis: 100%;
    }
    .responsive-table .col {
      display: flex;
      padding: 10px 0;
    }
    .responsive-table .col:before {
      color: #6c7a89;
      padding-right: 10px;
      content: attr(data-label);
      flex-basis: 50%;
      text-align: right;
    }
  }
</style>
