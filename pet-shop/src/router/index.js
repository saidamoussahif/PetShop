import { createRouter, createWebHistory } from "vue-router";
import HomeView from "../views/HomeView.vue";
import About from "../views/About.vue";
import loginView from "../views/client/loginView.vue";
import SignUp from "../views/client/SignUp.vue";
import ContactView from "../views/ContactView.vue";
import DashboardView from "../views/Admin/DashboardView.vue";
// import DashboardClient from "../views/client/DashboardClient.vue";
import AddProduct from "../views/Admin/AddProduct.vue";
import signinAdmin from "../views/Admin/signinAdmin.vue";
import ProductView from "../views/Admin/ProductView.vue";
import PetProduct from "../views/PetProduct.vue";
import CategoryView from "../views/Admin/CategoryView.vue";
import OrdersView from "../views/Admin/OrdersView.vue";
import MessageView from "../views/Admin/MessageView.vue";
import AccountsView from "../views/Admin/AccountsView.vue";
import AddToCart from "../views/client/AddToCart.vue";
import WishList from "../views/WishList.vue";




const routes = [
  {
    path: "/",
    name: "home",
    component: HomeView,
  },
  {
    path: "/About",
    name: "About",
    component: About,
  },

  {
    path: "/loginView",
    name: "loginView",
    component: loginView,
  },
  {
    path: "/SignUp",
    name: "SignUp",
    component: SignUp,
  },
  {
    path: "/ContactView",
    name: "ContactView",
    component: ContactView,
  },
  
  {
    path: "/DashboardView",
    name: "DashboardView",
    component: DashboardView,
  },
  // {
  //   path: "/DashboardClient",
  //   name: "DashboardClient",
  //   component: DashboardClient,
  // },
  {
    path: "/AddProduct",
    name: "AddProduct",
    component: AddProduct,
  },
  {
    path: "/AddToCart",
    name: "AddToCart",
    component: AddToCart,
  },
  {
    path: "/ProductView",
    name: "ProductView",
    component: ProductView,
  },
  {
    path: "/PetProduct",
    name: "PetProduct",
    component: PetProduct,
  },
  {
    path: "/CategoryView",
    name: "CategoryView",
    component: CategoryView,
  },
 
  {
    path: "/signinAdmin",
    name: "signinAdmin",
    component: signinAdmin,
  },
  {
    path: "/OrdersView",
    name: "OrdersView",
    component: OrdersView,
  },
  {
    path: "/MessageView",
    name: "MessageView",
    component: MessageView,
  },
  {
    path: "/AccountsView",
    name: "AccountsView",
    component: AccountsView,
  },
  {
    path: "/WishList",
    name: "WishList",
    component: WishList,
  },
 
];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
});

export default router;
