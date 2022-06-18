<template>
  <div class="product">
    <NavBar />

    <div class="box-container">
      <div class="box" v-for="product in products" :key="product.id">
      <div v-if="products !== ''">
        <div class="image">
           <img
              :src="`http://localhost/fil-rouge/pet-shop/src/uploads_images/${product.image}`"
              alt=""
              class="w-100"
            />
        </div>
        <div class="info">
          <!-- <h3 class="title"> {{ product.name }}</h3> -->
          <div class="description">    
               <!-- <h5>Quantity:{{ product.quantity }}</h5> -->
              
            <p>
           <span>Description of product:</span> {{ product.details }}
            </p>
          </div>
          <div class="subInfo">
     

            <div class="price">
              {{ product.price }}
              MAD
            </div>
            <div class="stars">
              <FIcons :icon="['fas', 'star']" />
              <FIcons :icon="['fas', 'star']" />
              <FIcons :icon="['fas', 'star']" />
              <FIcons :icon="['fas', 'star']" />
              <FIcons :icon="['fas', 'star-half']" />
            </div>
          <!-- <div class="quantity"><input type="number" min="1" placeholder="select"></div> -->

          </div>
        </div>
        
        <div class="overlay">
          <button class="addToCart"  @click="addToCartHandler(product)"><FIcons :icon="['fas', 'shopping-cart']" /></button>
        </div>
      </div>
      </div>
    </div>
  </div>
</template>
<script>
  import axios from "axios";
  import NavBar from "../components/NavBar";
  export default {
    categ: "",
    name: "PetProduct",
    components: {
      NavBar,
    
    },
    data() {
      return {
        products: "",
      };
    },
    beforeMount() {
      if (localStorage.getItem("TypeCategory"))
        this.categ = localStorage.getItem("TypeCategory");
    },
    mounted() {
      this.getProducts();

    },
    methods: {
      addToCartHandler:async function(product){
        const data = JSON.parse(localStorage.getItem("login"));
        if(data){
          const client = data.client;
         console.log('client');
          const productCart = new FormData();
        productCart.append("id_client", client.id_client);
        productCart.append("id_product", product.id);
        productCart.append("quantity", 1); 
        const response = await axios.post(
          "http://localhost/fil-rouge/pet-shop/Backend/CartController/addToCart",
          productCart
        );
        console.log(response.data);
       
          }
        
        else{
          alert("Please login to add to cart");
            this.$router.push("/loginview");
        }
      },
        

      getProducts: async function () {
        await axios
          .post(
            "http://localhost/fil-rouge/pet-shop/Backend/ProductController/readBycategoryName/" +
              this.categ
          )
          .then((response) => {
            if (response.data.message) {
              alert(response.data.message);
              this.$router.push("/");

            } else {
              if (response.data) {
                this.products = response.data;
                // console.log(this.products);
              }
            }
          });
    },
    },
  };
</script>

<style scoped>
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    text-transform: capitalize;
    text-decoration: none;
    font-family: "poppins", sans-serif;
    transition: all 0.4s cubic-bezier(0, 1.57, 0.67, 1.18);
  }
  .box-container {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-wrap: wrap;
    background: rgb(255, 255, 255);
  }
  .box {
    /* flex:; */
    width: calc(100% / 3 - 20px);
    background: #fff;
    border: 1px solid rgb(132, 132, 132, 0.3);
    position: relative;
    overflow: hidden;
    margin: 20px;
    border-radius: 8px;
  }
  .box .image {
    padding: 10px;
    /* background: #eee; */
    text-align: center;
  }
  .box .image img {
    width: 250px;
    height: 200px;
    object-fit: cover;
    /* filter: drop-shadow(0 3px 5px rgba(0, 0, 0, 0.7)); */
  }
  .box .info .title {
    padding: 10px;
    color: rgb(0, 0, 0);
    font-size: 20px;
  }
  .box .info .description {
    padding: 20px;
    text-align: center;
    color: rgb(99, 99, 99);
    font-size: 15px;
  }
  .box .info .subInfo {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 15px 10px;
    border-top: 1px solid rgba(103, 103, 103, 0.3);
  }

  .box .info .subInfo .price {
    color: #28a0e5;
    font-size: 15px;
    font-weight: bold;
  }
  .box .info .subInfo .price input {
    border-radius: 3px;
    border: 1px solid #8d8d8d;
    padding: 5px;
    width: 40px;
  }
  .box .info .subInfo .price span {
    font-size: 15px;
    color: #999;
    text-decoration: line-through;
  }
  .box .info .subInfo .stars {
    display: flex;
    justify-content: space-between;
    align-items: center;
    color: #fa9c4e;
    font-size: 15px;
  }
   .box .info .subInfo .quantity input {
    display: flex;
    justify-content: space-between;
    align-items: center;
    color: #3d3d3d;
    width: 80px;
    border-radius: 3px;
    border: 1px solid #8d8d8d;
    padding: 5px;
    height: auto;
    font-size: 18px;
  }
  .box .info .subInfo .qty {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 40px;
    height: 40px;
    border-radius: 3px;
    background: #ffffff;
    color: rgb(0, 0, 0);
    font-size: 18px;
    transition: all 0.4s cubic-bezier(0, 1.57, 0.67, 1.18);
  }

  .box .overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 223px;
    background: rgba(0, 0, 0, 0.3);
    display: flex;
    justify-content: center;
    align-items: center;
    transition: none;
    transform: scale(0);
  }
  .box:hover .overlay {
    transform: scale(1);
  }
  .box .overlay .addToCart {
    color: rgb(202, 200, 200);
    background: none;
    border: none;
    /* border-radius: 3px; */
    margin: 10px;
    padding: 13px 15px;
    font-size: 35px;
    transform: translateY(-150px);
    transition-property: transform;
    transition-delay: calc(0.1s);
  }
  .box .overlay .addToCart:hover {
    color: #fa9c4e;
  }
  .box:hover .overlay .addToCart {
    transform: translate(0px);
  }
  .btn {
    margin: 2rem;
  }

  @media(max-width:760px) {
    .box {
       width: 100%;

    }
  }


</style>
