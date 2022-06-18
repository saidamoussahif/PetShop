<template>
  <div class="PetFood">
    <section class="add-products">
      <h1 class="heading">Add Product</h1>
      <form v-on:submit.prevent="Add()">
        <div class="flex">
          <div class="inputBox">
            <span>Product name</span>
            <input
              v-model="name"
              type="text"
              required
              placeholder="enter product name"
              maxlength="100"
              class="box"
            />
          </div>
          <div class="inputBox">
            <span>Price</span>
            <input
              v-model="price"
              type="number"
              min="0"
              max="99999999999"
              required
              placeholder="enter product price"
              class="box"
            />
          </div>
          <div class="inputBox">
            <span>Image</span>
            <input
              type="file"
              ref="file"
              @change="onFileChange"
              name="image_01"
              class="box"
              accept="image/jpg, image/jpeg, image/png, image/webp"
              required
            />
          </div>
          <div class="inputBox">
            <span>Quantity</span>
            <input
              v-model="quantity"
              type="number"
              class="box"
              placeholder="enter product quantity"
              required
            />
          </div>
          <div class="box inputBox dropdown ">
            <label for="examplegareA">Category</label>
            <select name="category" class="box" v-model="category" id="">
              <option value="">Select Category</option>
              <option
                v-for="(category, key) in categories"
                v-bind:value="category.name"
                v-bind:key="key"
              >
                {{ category.name }}
              </option>
            </select>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
              <li v-for="category in categories" :key="category.id">
                <a class="dropdown-item" href="#">{{ category.name }}</a>
              </li>
            </ul> 
          </div>
          <div class="inputBox">
            <span>Product details</span>
            <textarea
              v-model="details"
              class="box"
              cols="30"
              rows="10"
              placeholder="enter product details"
              required
              maxlength="500"
            ></textarea>
          </div>
          <input type="submit" value="Submit" class="btn text-center" />
        </div>
      </form>
    </section>
  </div>
</template>

<script>
  import axios from "axios";
  export default {
    name: "AddFood",
    components: {},
    data() {
      return {
        categories: [],
        name: "",
        price: "",
        image: "",
        quantity: "",
        details: "",
        category: "",
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
        console.log(response.data);
      },
      onFileChange(e) {
        this.image = e.target.files[0];
      },

      Add: async function () {
        console.log(this.image);
        const formData = new FormData();
        formData.append("name", this.name);
        formData.append("price", this.price);
        formData.append("image", this.image);
        formData.append("quantity", this.quantity);
        formData.append("category_name", this.category);
        formData.append("details", this.details);
        console.log(this.name);
        await axios
          .post(
            "http://localhost/fil-rouge/pet-shop/Backend/ProductController/create",
            formData,
            {
              headers: {
                "Content-Type": "multipart/form-data",
              },
            }
          )

          .then((Response) => {
            console.log(Response.data);
            window.location.href = "/ProductView";
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
  .PetFood {
    /* background-color: #eee; */
    width: 100%;
    /* background: linear-gradient(to top, rgb(0,0,0,0.1)50%,rgb(0,0,0,0.1)50%), url("../assets/"); */
    background-position: center;
    background-size: cover;
    height: 100vh;
    display: flex;
  }
  .add-products {
    width: 100%;
    height: auto;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
  }
  .add-products .heading {
    font-size: 2rem;
    font-weight: bold;
    color: rgb(88, 109, 216);
    margin-bottom: 2rem;
    /* text-transform: uppercase; */
  }
  .add-products form {
    margin: 0 auto;
    max-width: 800px;
    width: 100%;
    display: flex;
    background-color: #eee;
    border-radius: 0.5rem;
    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
    border: 0.1rem solid #eee;
    padding: 2rem;
  }
  .add-products form .flex {
    display: flex;
    flex-wrap: wrap;
    gap: 0.5rem;
  }
  .add-products form .flex .inputBox {
    flex: 1 1 20rem;
    margin: 0.5rem;
    display: block;
  }
  .add-products form .flex .inputBox .box {
    background-color: rgb(255, 255, 255);
    color: #333;
    width: 100%;
    border-radius: 5px;
    border: 0.1rem solid rgb(212, 212, 212);
    padding: 12px 14px;
    font-size: 15px;
    margin: 5px 0;
  }
  .add-products form .flex .inputBox .box:focus {
    border: 0.1rem solid #0d61e8;
  }
  .add-products form .flex .inputBox span {
    font-size: 1rem;
    color: #666;
    font-family: "Nunito", sans-serif;
  }
  .add-products form .flex .inputBox textarea {
    resize: none;
    height: 2.5rem;
  }
  .btn {
    width: 100%;
    height: 7vh;
    margin-top: 2.1rem;
    padding-left: 0.5rem;
    background-color: rgb(88, 109, 216);
    color: #fff;
  }
  .btn:hover {
    background-color: rgb(73, 97, 215);
  }
  .form-control {
    background-color: rgb(255, 255, 255);
    border: #1d1f21;
    color: #333;
    border: 0.1rem solid rgb(218, 216, 216);
    width: 100%;
  }
</style>
