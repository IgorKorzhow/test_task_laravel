import { createWebHistory, createRouter } from "vue-router";
import ProductPage from "@/components/pages/products/ProductPage.vue";
import CreateProductModal from "@/components/pages/products/CreateProductModal.vue";
import ShowProductModal from "@/components/pages/products/ShowProductModal.vue";
import EditProductModal from "@/components/pages/products/EditProductModal.vue";


const routes = [
    {
        path: "/",
        redirect: "/products"
    },
    {
        path: "/products",
        name: "products",
        component: ProductPage,
        children: [
            {
                path: 'create',
                name: 'products.create',
                component: CreateProductModal,
            },
            {
                path: 'show/:productId',
                name: 'products.show',
                component: ShowProductModal,
            },
            {
                path: 'edit/:productId',
                name: 'products.edit',
                component: EditProductModal,
            }
        ]
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});
export default router;
