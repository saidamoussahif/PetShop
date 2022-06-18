<template>

<div class="Apropos">
<NavBar/>

<section class="about overflow-hidden container">
   <div class="row">
      <div class="image">
         <!-- <img src="../assets/pet-img.png" alt=""> -->
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
<!-- **************************************************************************************** -->


        <div class="space" style="text-align: left"></div>
















<!-- **************************************************************************************** -->









 <!-- Image Showcases-->
        <section class="showcase  overflow-hidden  bg-white">
            <div class="">
                <div class="row g-0">
                    <div class="col-lg-6 order-lg-2 text-white  showcase-img image-cover-class" style="height: 350px;" >
                   
                    </div>
                    <div class="col-lg-6 order-lg-1 my-auto showcase-text" >
                        <h2 class="text-center mt-3 mb-5">Fully Responsive Design</h2>
                        <p class="lead mb-0">When you use a theme created by Start Bootstrap, you know that the theme will look great on any device, whether it's a phone, tablet, or desktop the page will behave responsively!</p>
                    </div>
                </div>
                <div class="row g-0">
                    <div class="col-lg-6 text-white showcase-img image-cover-class2" style="height:350px;">
                      
                    </div>
                    <div class="col-lg-6 my-auto showcase-text">
                        <h2 class="text-center mt-3 mb-5">Updated For Bootstrap 5</h2>
                        <p class="lead mb-0">Newly improved, and full of great utility classes, Bootstrap 5 is leading the way in mobile responsive web development! All of the themes on Start Bootstrap are now using Bootstrap 5!</p>
                    </div>
                </div>
                <div class="row g-0">
                    <div class="col-lg-6 order-lg-2 text-white showcase-img image-cover-class3" style="height:350px;" >
                     
                    </div>
                    <div class="col-lg-6 order-lg-1 my-auto showcase-text">
                        <h2 class="text-center mt-3 mb-5">Easy to Use & Customize</h2>
                        <p class="lead mb-0">Landing Page is just HTML and CSS with a splash of SCSS for users who demand some deeper customization options. Out of the box, just add your content and images, and your new landing page will be ready to go!</p>
                    </div>
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
.Apropos{
  background-color: rgb(255, 255, 255);
  height: 150vh;
   background-image: url("../assets/back-view.webp");
   background-repeat: no-repeat;
   background-size: cover;
   background-position: center;
   background-attachment: fixed;
   padding: 0;
   margin: 0;
   /* height: 100vh; */
}


.about {
display: flex;
align-items: center;
flex-wrap: wrap;
gap: 1.5em ;
width: 100%;
}
/* .row{
   padding-top: 7rem;
} */
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


.showcase {
  background-color: #eee;
  width: 100%;
  display: flex;
  flex-wrap: wrap;
  gap: 1.5em ;
}
.showcase .showcase-img{
  flex: 1 1 40rem;
}
 
.showcase .showcase-img img{
  width: 100%;
}
.showcase .showcase-text h2{
  font-size: 2rem;
  color: #333;
  text-transform:capitalize; 
}

.row {
  display: flex;
  flex-wrap: wrap;
  margin-top: calc(-1 * var(--bs-gutter-y));
  margin-right: calc(-0.5 * var(--bs-gutter-x));
  margin-left: calc(-0.5 * var(--bs-gutter-x));
}
.showcase .showcase-img {
    min-height: 7rem;
    background-size: cover;
}
.lead {
    font-size: 1rem;
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
    /* padding: 7rem; */
    color: #818181;
}

/* image cover */

.image-cover-class
{
      background-image: url(../assets/gallery12.jpg); ;
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
     
}
.image-cover-class2
{
      background-image: url(../assets/oiseau.png); ;
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
}
.image-cover-class3
{
      background-image: url(../assets/back-view.webp); 
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
}


.space{
   padding-top: 7rem;
    padding-bottom: 7rem;
}









 </style>