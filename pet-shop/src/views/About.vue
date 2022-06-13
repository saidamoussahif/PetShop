<template>

<div class="Apropos">
<NavBar/>

<section class="about">
   <div class="row">
      <div class="image">
         <img src="../assets/about_img.png" alt="">
      </div>
      <div class="content mt-5">
         <h3>Why choose us?</h3>
         <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
             Illo cumque ipsa mollitia provident. Vero odio autem facere,
             alias nisi velit ex ad ea repellat fugit consequuntur eveniet quam molestias voluptas.</p>
             <a href="/ContactView" class="btn">Contact us</a>
      </div>
   </div>

</section>



</div>

  <FooterView />
</template>


<script>
import FooterView from "../components/FooterView";
import NavBar from '@/components/NavBar.vue'
export default {
  name: 'AboutUs',
  components: {
    NavBar,
    FooterView,
  }
}
</script>

  


 <style scoped>
 * {
    font-family: 'Nunito', sans-serif;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    outline: none;
    border: none;
    text-decoration: none;
}
*::selection{
   background-color: #2980b9;
   color: rgb(255, 255, 255);;
}

::-webkit-scrollbar{
   height: .5rem;
   width: 1rem;
}

::-webkit-scrollbar-track{
   background-color: transparent;
}

::-webkit-scrollbar-thumb{
   background-color: #2980b9;
}
.Apropos{
  background-color: #eee;
  height: 150vh;
}
.about {
display: flex;
align-items: center;
flex-wrap: wrap;
gap: 1.5em ;
width: 100%;
}
.row{
   padding-top: 7rem;
}
.about .row .image{
   flex: 1 1 40rem;

}
.about .row .image img{
   width: 80%;
   margin-left: 4rem;
}
.about .row .content{
   flex: 1 1 40rem;
}
.about .row .content h3{
   font-size: 2rem;
   color: #333;
   text-transform:capitalize; ;
   
}
.about .row .content P{
   padding:1rem 0 ;
   line-height: 2;
   font-size: 1rem;
   color: #666;
}
.about .row .content .btn{
   display: inline-block;
   width: auto;
}
  
  
  .btn,
.delete-btn,
.option-btn{
  display: inline-block;
   padding: 10px 30px;
  cursor: pointer;
  font-size: 18px;
  color:#fff ;
  border-radius: 5px;
  text-transform: capitalize;
}
.btn:hover,
.delete-btn:hover,
.option-btn:hover{
background-color: #333;
}
.btn{
  background-color: #f39c12;
  width: 100%;
  margin-top: 10px;
}
.delete-btn{
  background-color:#e74c3c ;
}
.option-btn{
  background-color: #925b04;
}

/* @media screen and (max-width:760px) {
 .about .row {
   flex: 1 1 40rem;
   display: block;
   margin: 4rem;
 }
} */
 </style>