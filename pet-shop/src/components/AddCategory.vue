<template>
  <!-- <div class="PetCategory">

    <section class="add-category">
      <h1 class="heading">Add Category</h1>
      <form action="" method="POST" enctype="multipart/form-data" v-on:submit.prevent="Add">
        <div class="flex">
          <div class="inputBox">
            <span>Category name</span>
            <input
            v-model="name"
              type="text"
              required
              placeholder="enter category name"
              name="name"
              maxlength="100"
              class="box"
            />
          </div> 
          <input
            type="submit"
            value="add category"
            class="btn"
            name="submit"
          />
        </div>
      </form>
    </section>
  </div> -->
   <div
          class="modal fade"
          id="addCategory"
          tabindex="-1" 
          aria-labelledby="exampleModalLabel"
          aria-hidden="true"
        >
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title text-center">
                  Add Category
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
                  <form  v-on:submit.prevent="Add()">
                    <div class="form-group">
                      <label for="examplegareA">Name</label>
                      <input type="text" class="form-control" v-model="name" required aria-describedby="emailHelp"/>
                    </div>   
              <input
                  type="submit"
                  class="btn"
                  value="Add Category"
                />              
                  </form>
                </div>
              </div>
              <div class="modal-footer">

              </div>
            </div>
          </div>
        </div>
</template>
<script>
import axios from "axios";
  export default {
    name: "AddCategory",
    components: {},
    
    data() {
      return {
        name: "",
      };
    },

     methods: {
      Add() {
        const formData = new FormData();
        formData.append("name", this.name);
        axios.post(
            "http://localhost/fil-rouge/pet-shop/Backend/CategoryController/create",
            formData
          )
          .then((Response) => {
            console.log(Response.data);
             this.$router.go("CategoryView");
          });
      },
    },
    }

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
  .modal-title{
    display: flex;
    justify-content: center;
    align-items: center;
    padding-left: 32%;
    color: rgb(88, 109, 216);
    font-weight: bold;
  }
  .PetCategory {
    background-color: #eee;
    height: 100vh;
    display: flex;
  }
  .add-category {
    width: 100%;
    height: auto;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
  }
  .add-category.heading {
    font-size: 2rem;
    font-weight: bold;
    color: rgb(88, 109, 216);
    margin-bottom: 2rem;
    text-transform: uppercase;
  }
  .add-category form {
    margin: 0 auto;
    max-width: 800px;
    width: 100%;
    display: flex;
    background-color: #fff;
    border-radius: 0.5rem;
    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
    border: 0.1rem solid rgb(157, 157, 157);
    padding: 2rem;
  }
  .add-category form .flex {
    display: flex;
    flex-wrap: wrap;
    gap: 0.5rem;
  }
  .add-category form .flex .inputBox {
    flex: 1 1 20rem;
    margin: 0.5rem;
    display: block;
  }
  .add-category form .flex .inputBox .box {
    background-color: #eee;
    color: #333;
    width: 100%;
    border-radius: 5px;
    border: 0.1rem solid rgb(157, 157, 157);
    padding: 12px 14px;
    font-size: 15px;
    margin: 5px 0;
  }
  .add-category form .flex .inputBox .box:focus {
    border: 0.1rem solid rgb(88, 109, 216);
  }
  .add-category form .flex .inputBox span {
    font-size: 1rem;
    color: #666;
    font-family: "Nunito", sans-serif;
  }
  .add-category form .flex .inputBox textarea {
    resize: none;
    height: 2.5rem;
  }
  .btn {
    background-color: rgb(88, 109, 216);
    width: 50%;
    height: 7vh;
    margin-top: 2.1rem;
    margin-left: 25%;
    color: #fff;
  }
</style>
