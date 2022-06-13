<template>
  <div
    class="modal fade"
    id="editProductModal"
    tabindex="-1"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true"
  >
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-center" id="exampleModalLabel">
            Edit Product
          </h5>
          <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"
            aria-label="Close"
          ></button>
        </div>
        <div class="modal-body">
          <div class="modal-body text-dark bg-light">
            <form @submit.prevent="update(editProduct.id)" method="POST">
              <div class="form-group">
                <label for="examplegareD">Image</label>
                <input
                  type="file"
                  class="form-control"
                  name="image"
                  v-bind="editProduct.image"
                />
              </div>

              <div class="form-group">
                <label for="examplegareA" selected disabled>Name</label>
                <input
                  type="text"
                  class="form-control"
                  v-model="editProduct.name"
                />
              </div>
              <div class="form-group">
                <label for="examplegareA">Price</label>
                <input
                  type="number"
                  class="form-control"
                  name="Price"
                  v-model="editProduct.price"
                />
              </div>
              <div class="form-group">
                <label for="examplegareA">Quantity</label>
                <input
                  type="number"
                  class="form-control"
                  name="quantity"
                  v-model="editProduct.quantity"
                />
              </div>
              <div class="form-group inputBox dropdown mt-3">
                <label for="examplegareA">Category</label>
                <select name="category" v-model="category" id="">
                  <option value="">Select Category</option>
                  <option
                    v-for="(category, key) in categories"
                    v-bind:value="category.name"
                    v-bind:key="key"
                  >
                    {{ category.name }}
                  </option>
                </select>
              </div>
            </form>
          </div>
        </div>
        <div class="modal-footer">
          <input type="submit" value="Submit" class="btn" name="edit_product" />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import axios from "axios";
  export default {
    name: "EditProduct",
    components: {},
    data() {
      return {
        categories: [],
        editProduct: "",
        id: "",
      };
    },
     mounted() {
      this.getCategories();
      this.getProducts();
    },
    methods: {
      getCategories: async function () {
        const response = await axios.get(
          "http://localhost/fil-rouge/pet-shop/Backend/CategoryController/read"
        );
        this.categories = response.data;
        console.log(response.data);
      },
       getProducts: async function () {
        const response = await axios.getAll(
          "http://localhost/fil-rouge/pet-shop/Backend/ProductController/read"
        );
        this.products = response.data;
      },
  
   async getSingle(id) {
        const response = await fetch(
          "http://localhost/fil-rouge/pet-shop/Backend/ProductController/readSingle/" + id,
          { method: "POST", headers: { "content-type": "applicaton/json" } }
        );
        const data = await response.json();
        console.log(data);
        this.editProduct = data;
      },
     async update(id) {
        const obj = {   
           image: this.editProduct.image,
          name: this.editProduct.name,
          price: this.editProduct.price,
          quantity: this.editProduct.quantity,
          category: this.category,
          datails: this.editProduct.details,
        };

        await fetch(" http://localhost/fil-rouge/pet-shop/Backend/ProductController/update/" + id, {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify(obj),
        });
        await this.getAll();
      
        this.$router.push("/ProductView");
      }, 
      
  },
  }
</script>
<style scoped>
  .form-group input {
    border: 2px solid rgb(48, 48, 48);
  }
  .btn {
    background-color: rgb(87, 136, 235);
    width: 40%;
    height: 7vh;
    margin-top: 2.1rem;
    margin-right: 9rem;
  }
  .btn input:focus {
    border: 0.1rem solid #0d61e8;
  }
  .text-center {
    padding-left: 10rem;
    color: rgb(87, 136, 235);
  }
</style>
