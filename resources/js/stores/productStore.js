import {defineStore} from "pinia";

export const useProductStore = defineStore('productStore', {
    state: () => ({
        products: [],
        per_page: 8,
        paginationInfo: Object,
    }),
    actions: {
        async fetchProducts() {
            axios.get('/api/products', {
                params: {
                    per_page: this.per_page,
                }
            })
                .then(response => {
                    this.products = response.data.data;
                    this.paginationInfo = response.data.meta;
                })
        }
    }
})
