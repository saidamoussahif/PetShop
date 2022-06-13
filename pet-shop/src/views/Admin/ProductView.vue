<template>
  <div class="page">
    <SideBar />

    <!-- <div class="col-10" style="text-align: left"></div> -->
    <!-- <div class="col-2">
      <router-link
        class="btn add_product"
        style="width: 10vw"
        :to="{ path: '/AddProduct' }"
        >+</router-link
      > -->
   

    <div class="container">
      <h2>List of pet product</h2> 
        <div class="row rdvherd">
      <div class="col-10" style="text-align: left"></div>
      <div class="col-2">
        <router-link
         class="btn add_product"
          style="width: 9vw"
      :to="{ path: '/AddProduct' }"
          >+</router-link
        >
      </div>
    </div>
      <ul class="responsive-table">
        <li class="table-header">
          <div class="col col-2 text-white">Image</div>
          <div class="col col-1 text-white">Name</div>
          <div class="col col-1 text-white">Categpry</div>
          <div class="col col-1 text-white">Price</div>
          <div class="col col-1 text-white">Quantity</div>
          <div class="col col-1 text-white">Details</div>
          <div class="col col-1 text-white">Action</div>
        </li>
        <li class="table-row" v-for="product in products" :key="product.id">
          <div class="col col-1" data-label="">
            <img
              :src="`http://localhost/fil-rouge/pet-shop/src/uploads_images/${product.image}`"
              alt=""
              class="w-100"
            />
          </div>
          <div class="col col-1" data-label="Customer Name :">
            {{ product.name }}
          </div>
          <div class="col col-1" data-label="Amount :">
            {{ product.category_name }}
          </div>
          <div class="col col-1" data-label="Payment Status :">
            {{ product.price }}
          </div>
          <div class="col col-1" data-label="Payment Status :">
            {{ product.quantity }}
          </div>
          <div class="col col-1" data-label="Payment Status :">
            {{ product.details }}
          </div>
          <div class="col col-1" data-label="Payment Status">
            <button
              class="btn edit"
              data-bs-toggle="modal"
              data-bs-target="#editProductModal"
               @click="getSingle(elemt.id)"
            >
              <FIcons :icon="['fa', 'edit']" />
            </button>
            <button class="btn delete" @click="del(product.id)">
              <FIcons :icon="['fas', 'trash']" />
            </button>
          </div>
        </li>
      </ul>
    </div>

    <!-- <div class="menu col-lg-12 my-lg-0 my-1">
      <div class="container">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th class="text-center">Name</th>
              <th class="text-center">Price</th>
              <th class="text-center">Quantity</th>
              <th class="text-center">Image</th>
              <th class="text-center">Details</th>
              <th class="text-center">Category</th>
              <th class="text-center">Action</th>
            </tr>
          </thead>
          <tbody v-for="product in products" :key="product.id">
            <tr>
              <td class="text-center">{{ product.name }}</td>
              <td class="text-center">{{ product.price }}</td>
              <td class="text-center">{{ product.quantity }}</td>
              <td class="text-center">
                <img
                  :src="`http://localhost/fil-rouge/pet-shop/Backend/uploads_images/${product.image}`"
                  style="width: 200px; height: 100px"
                  alt=""
                />
              </td>
              <td class="text-center">{{ product.details }}</td>
              <td class="text-center">{{ product.category_name }}</td>
              <td class="text-center">
                <span class="action_btn">
                  <button
                    type="button"
                    class="btn btn-outline-primary"
                    data-bs-toggle="modal"
                    data-bs-target="#editProductModal"
                  >
                    <FIcons :icon="['fa', 'edit']" />
                  </button>
                  <button type="button" class="btn btn-outline-danger">
                    <FIcons :icon="['fa', 'delete-left']" />
                  </button>
                </span>
              </td>
            </tr>
          </tbody>
        </table>
      </div> -->
    <EditCategory />
    <!-- </div> -->

    <!-- <table>
            <thead>
              <tr>
                <th class="text-center">Name</th>
                <th class="text-center">Price</th>
                <th class="text-center">Quantity</th>
                <th class="text-center">Image</th>
                <th class="text-center">Details</th>
                <th class="text-center">Category </th>
                <th class="text-center">Action</th>
              </tr>
            </thead>

            <tbody v-for="product in products" :key="product.id">
              <tr>
                <td>{{product.name}}</td>
                <td>{{product.price}}</td>
                <td>{{product.quantity}}</td>
                <td>
                  <img
                    :src='`http://localhost/fil-rouge/pet-shop/Backend/uploads_images/${product.image}`'
                    style="width: 200px; height: 100px;"
                    alt=""/>
                  </td>
                <td>{{product.details}}</td>
                 <td>{{product.category_name}}</td>
                <td>
                  <span class="action_btn">
                    <button
                      type="button"
                      class="btn btn-outline-dark"
                      data-bs-toggle="modal"
                      data-bs-target="#editProductModal"
                    >
                      Edit
                    </button>
                    <button type="button" class="btn">Remove</button>
                  </span>
                </td>
              </tr>
            </tbody>
          </table>  -->
    <EditProduct />
    <!-- </div> -->
  </div>
  <!-- </div> -->
</template>

<script>
  import axios from "axios";
  import SideBar from "@/components/SideBar.vue";
  import EditProduct from "@/components/EditProduct.vue";
  export default {
    name: "DogView",
    components: {
      SideBar,
      EditProduct,
    },
    data() {
      return {
        products: [],
        EditProduct: "",
      };
    },
    mounted() {
      this.getProducts();
    },
    methods: {
      getProducts: async function () {
        const response = await axios.get(
          "http://localhost/fil-rouge/pet-shop/Backend/ProductController/read"
        );
        this.products = response.data;
      },
      async del(id) {
        console.log(id);
        await fetch(
          "http://localhost/fil-rouge/pet-shop/Backend/ProductController/delete/" +
            id,
          {
            method: "POST",
          }
        );
        this.$router.push("/ProductView");
        this.getProducts();
      },
      async getSingle(id) {
        const response = await fetch(
          "http://localhost/fil-rouge/pet-shop/Backend/ProductController/readSingle/" +
            id,
            {
              method: "POST",
              headers: {
                "Content-Type": "application/json",
              }
            }
        );
        const data = await response.json();
        console.log(data);
        this.EditProduct = data;
      },
    },
  };
</script>

<style scoped>
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

  .add_product {
    background-color: rgb(88, 109, 216);
    color: #fff;
    margin: 1.1rem;
    border-color: #f1f1f1;
    border-radius: 5px;
    font-size: 20px;
    font-family: "Roboto", sans-serif;
  }
  .add_product:hover {
    background-color: rgb(50, 73, 189);
  }
</style>
