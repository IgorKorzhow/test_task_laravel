import {defineStore} from "pinia";

export const useProductStore = defineStore('productStore', {
    state: () => ({
        products: null,
        selectedProduct: null,
        per_page: -1,
        paginationInfo: Object,
    }),
    actions: {
        fetchProducts() {
            axios.get('/api/products', {
                params: {
                    per_page: this.per_page,
                }
            })
                .then(response => {
                    this.products = response.data.data;
                    this.paginationInfo = response.data.meta;
                })
        },
        fetchProductById(productId) {
            this.selectedProduct = null;
            axios.get(`/api/products/${productId}`)
                .then(response => {
                    this.selectedProduct = response.data;
                })
        },
        storeProduct(callback, productData) {
            return axios.post('/api/products', productData.product, {
                headers: {
                    "Content-Type": "application/json"
                }
            })
                .then(() => {
                    this.fetchProducts();
                    callback();
                })
                .catch((error) => {
                    if (error.response && error.response.status === 422) {
                        console.log(error.response.data.errors);
                        productData.validationErrors = error.response.data.errors;
                    } else {
                        console.log(error);
                    }
                })
        },
        deleteProductById(productId, callback) {
            this.selectedProduct = null;
            axios.delete(`/api/products/${productId}`)
                .then(() => {
                    this.fetchProducts();
                    callback()
                })
        },
    }
})
