<template>
  <div class="page">
    <NavBar />

    <!-- ***************************************************************************************************************** -->

    <!-- <div class="container d-flex justify-content-center mt-50 mb-50"> -->
      <!-- <div class="row"> -->
        <div>

       
        <div class="col-md-10 mx-auto" >
          
            <div
              class="media align-items-center align-items-lg-start text-center text-lg-left flex-column flex-lg-row" v-for="product in products" :key="product.id"
            >

          <div class="card card-body mt-3" v-if="products !== ''">
          
            <div
            style="justify-content: space-between"
              class="media align-items-center align-items-lg-start text-center text-lg-left flex-lg-row
              "
            >
            <div class="d-flex">
              <div class="mr-2 mb-3 mb-lg-0">
                <img
                   :src="`http://localhost/fil-rouge/pet-shop/src/uploads_images/${product.image}`"
                  alt=""
                  width="150"
                  height="150"
                />
              </div>

              <div class="media-body">
                <div class="media-title font-weight-semibold">
                  <h3  data-abc="true"
                    > {{ product.name }}</h3
                  >
                </div>

                <ul class="list-inline list-inline-dotted mb-3 mb-lg-2">
                  <li class="list-inline-item">
                    <a href="#" class="text-muted" data-abc="true"></a>
                  </li>
                  <li class="list-inline-item">
                    <a href="#" class="text-muted" data-abc="true">Mobiles</a>
                  </li>
                </ul>

                <p class="mb-3">
                 {{ product.details }}
                </p>

                <!-- <ul class="list-inline list-inline-dotted mb-0">
                  <li class="list-inline-item">
                    All items from
                    <a href="#" data-abc="true">Mobile junction</a>
                  </li>
                 
                </ul> -->
              </div>
            </div>

              <div class="mt-3 mt-lg-0 ml-lg-3 text-center d-block stars">
                <h3 class="mb-0 font-weight-semibold">$612.99</h3>

                 <div style="color:#f9913b;">
                  <FIcons class="icon" :icon="['fas', 'star']" />
                  <FIcons class="icon" :icon="['fas', 'star']" />
                  <FIcons class="icon" :icon="['fas', 'star']" />
                  <FIcons class="icon" :icon="['fas', 'star']" />
                  <FIcons class="icon" :icon="['fas', 'star-half']" />

                </div>
                   <button class="btn bg-danger delete">
                    delete
              <!-- <FIcons class="delete" :icon="['fas', 'trash']" /> -->
            </button>
             

               
              </div>
            </div>
          </div>
        </div>
          <a class="btn bg-warning">
                 Shop Now   
              <!-- <FIcons class="delete" :icon="['fas', 'trash']" /> -->
    </a>
    </div>

 </div>
    
  <!-- *************************************************************************************************** -->


    <!-- <div class="container">
      <ul class="responsive-table">
        <li class="table-header">
          <div class="col col-2 text-white">Image</div>
          <div class="col col-1 text-white">Name</div>
          <div class="col col-1 text-white">Quantity</div>
          <div class="col col-1 text-white">Price</div>
          <div class="col col-1 text-white">Details</div>
          <div class="col col-1 text-white">Action</div>
        </li>
        <li class="table-row" v-for="product in products" :key="product.id">
          <div class="col col-1" data-label="" v-if="products !== ''">
            <img
              :src="`http://localhost/fil-rouge/pet-shop/src/uploads_images/${product.image}`"
              alt=""
              class="w-100"
            />
          </div>
          <div class="col col-1" data-label="Produt Name :">
            {{ product.name }}
          </div>
          <div class="col col-1" data-label="Quantity :">
            {{ product.quantity }}
          </div>
          <div class="col col-1" data-label="Price :">
            {{ product.price }}
          </div>
          <div class="col col-1" data-label="Details :">
            {{ product.details }}
          </div> -->

          <!-- <div class="col col-1" data-label="Payment Status"> -->
            <!-- <button
              class="btn edit"
              data-bs-toggle="modal"
              data-bs-target="#editProductModal"
            >
              <FIcons :icon="['fa', 'edit']" />
            </button> -->
            <!-- <button class="btn delete">
              <FIcons :icon="['fas', 'trash']" />
            </button>
          </div>
        </li>
      </ul>
    </div> --> 
  </div>
  
  <!-- </div> -->
</template>

<script>
  import NavBar from "../../components/NavBar";
  import axios from "axios";
  export default {
    name: "MyCart",
    components: {
      NavBar,
    },
    data() {
      return {
        products: "",
        id_client: localStorage.getItem("login"),
        cart: [],
      };
    },
    mounted() {
      this.getCart();
      // console.log(this.products);
    },

    methods: {
      getCart: async function () {
        // console.log();
        const id = JSON.parse(this.id_client).client.id_client;
        await axios
          .post(
            "http://localhost/fil-rouge/pet-shop/Backend/CartController/read/" +
              id
          )
          .then((response) => {
            if (response.data.message) {
              // alert(response.data.message);
              this.$router.push("/");
            } else {
              if (response.data) {
                this.products = response.data;
                console.log("hfgdfej");
              }
            }
          });
      },
    },
  };
</script>

<style scoped>
 

  /* ************************************************** */






  * {
    margin: 0;
    font-family: Roboto, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto,
      "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji",
      "Segoe UI Symbol", "Noto Color Emoji";
    font-size: 0.8125rem;
    font-weight: 400;
    line-height: 1.5385;
    color: #333;
    text-align: left;
    background-color: #f5f5f5;
  }

  .mt-50 {
    margin-top: 50px;
  }
  .mb-50 {
    margin-bottom: 50px;
  }
  a {
    text-decoration: none !important;
  }

  .media {
    display: flex;
    align-items: center;
    padding: 40px;
  }
  .stars {
    width: 125px;
  }
  .stars .icon {
    font-size: 1rem;
    color: #f9913b;
  }
  .media-body {
    padding: 0 40px;
  }
  .media-title a {
    font-size: 18px;
    margin-bottom: 12px;
    display: block;
  }
  .btn .delete{
    margin-top: 10px;
    margin-bottom: 10px;
    color: red;
    font-size: 1.2rem;
  }
  .btn .delete:hover{
    color: rgb(119, 6, 6);

  }
  .bg-danger {
    margin-top: 1.5rem;
    margin-right: 2rem;
    color: white;
    width: 100px;
  }
@media (max-width: 768px){
  .media {
    padding: 20px;
  }
  .media-body {
    padding: 0 20px;
  }
  .media-title a {
    font-size: 14px;
    margin-bottom: 12px;
    display: block;
  }
  .btn .delete{
    margin-top: 10px;
    margin-bottom: 10px;
    color: red;
    font-size: 1.2rem;
  }
  .btn .delete:hover{
    color: rgb(119, 6, 6);

  }
  .bg-danger {
    margin-top: 1.5rem;
    margin-right: 2rem;
    color: white;
    width: 100px;
  }
}
/* .bg-warning {
  background-color: #ff9800 !important;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 10px;
    border-radius: 5px;
    margin-top: 1.5rem;
    margin-right: 2rem;
    float: right;
    color: white;
    width: 100px;
  }
  .bg-warning:hover{
    background-color: #965b03;
    color: white;
  } */
</style>

