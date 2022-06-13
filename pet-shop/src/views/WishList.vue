<template>
 <div class="menu">
       <ClientHeader/>
    

    <section class="products">
  
    <div class="box-container"> 
      <h1 class="heading">Your wishlist</h1>
        <form action="" method="post" class="box"> 

          <div class="image">
            <!-- <img   :src="`http://localhost/fil-rouge/pet-shop/Backend/uploads_images/${product.image}`" -->
             <!-- alt=""> -->
          </div>
          <div class="name"></div>
          <div class="flex">
                <div class="price"></div>
                <input type="number" name="qty" class="qty" min="1" max="99"
                value="1">
          </div>
          <input type="submit" value="add to cart" name="add_to_cart" class="btn">
          <input type="submit" value="delete item"  name="delete" class="btn btn_delete">
        </form>
    </div>
    </section>
    </div>
      <FooterView />
</template>


<script>
import FooterView from "../components/FooterView";
 import ClientHeader from "@/components/ClientHeader.vue";
export default {
    name:  "WishList",
    components: {
        ClientHeader,
        FooterView,
    },
   
   
}
</script>
<style scoped>
*{
  font-family:Georgia, 'Times New Roman', Times, serif;
    margin: 0px;
    padding: 0px;
}
.menu{
    width: 100%;
    height: 100vh;
    background: #f5f5f5;
}
.box-container .box {
    width: 400px;
    border-radius: 5px;
    border: 0.1rem solid rgb(157, 157, 157);
    padding: 12px 14px;
    font-size: 18px;
    margin: 10px 0;
  }
.btn {
    background-color: #2980b9;
    margin-top: 10px;
  }
.btn_delete {
    background-color: #db1009;
    margin-top: 10px;
  }
</style>