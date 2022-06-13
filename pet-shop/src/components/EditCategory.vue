<template>
     <!-- Modal For Edit Product-->
        <div
          class="modal fade"
          id="staticBackdrop"
          tabindex="-1" 
          aria-labelledby="exampleModalLabel"
          aria-hidden="true"
        >
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title text-center">
                  Edit Category
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
                  <form @submit.prevent="update()">
                   

                    <div class="form-group">
                      <label for="examplegareA">Name</label>
                      <input type="text" class="form-control" required  v-model="name"/>
                    </div>                 
                  </form>
                </div>
              </div>
              <div class="modal-footer">
                <input
                  type="submit"
                  value="Submit"
                  class="btn"
                    @click="Edit()"
                />
              </div>
            </div> 
          </div>
        </div>
</template>

<script>
import axios from "axios";
export default {
     name: "EditCategory",
    components: {},
    data() {
        return {
            editCategory:"" ,
            name: "",
            id: "",
        };
    },
    methods: {
      
        async getSingle(id) {
            const res = await fetch(
      "http://localhost/fil-rouge/pet-shop/Backend/CategoryController/getOneCategory/" + id,
            {method: "GET", headers: {"Content-Type": "application/json" ,
            }
            });
            const data = await res.json();
            console.log(data);
            this.editCategory = data;
        },

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
      async update(id) {
        const obj = {
          name: this.editCategory.name,
          id: id,
        };
        await fetch("http://localhost/fil-rouge/pet-shop/Backend/CategoryController/update/" + id, {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify(obj),
        });
        this.$router.go("CategoryView");

         
         
      },
    }
    
};
</script>




<style scoped>
 .modal form .flex .inputBox {
    flex: 1 1 20rem;
    margin: 0.5rem;
    display: block;
  }
  .modal form .flex .inputBox .box {
    background-color: #eee;
    color: #333;
    width: 100%;
    border-radius: 5px;
    border: 0.1rem solid #333;
    padding: 12px 14px;
    font-size: 15px;
    margin: 5px 0;
  }
  .modal form .flex .inputBox .box:focus {
    border: 0.1rem solid #0d61e8;
  }
 .form-group textarea {
    resize: none;
    height: 2.5rem;
  }
  .btn {
    background-color: rgb(88, 109, 216);
    width: 50%;
    height: 7vh;
    margin-top: 2.1rem;
    padding-left: 0.5rem;
  }
  .btn input:focus {
    border: 0.1rem solid #0d61e8;
  }
  .h5, h5 {
    color:#ff7200;
    font-size: 2.25rem;
    text-align:center;
}
.modal-title{
    color: #f39c12;
    font-size: 2rem;
    text-align:center;
    margin-left: 87px;
}
 
</style>