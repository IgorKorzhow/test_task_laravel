import {defineStore} from "pinia";
import {STATUSES} from "@/constants/statuses.js";

export const useProductStore = defineStore('productStore', {
    state: () => ({
        products: [],
        per_page: -1,
        paginationInfo: Object,
        createProduct: {
            article: '',
            name: '',
            status: STATUSES[0].value,
            data: [],
        },
        validationErrors: []
    }),
    actions: {
        addAttributeToCreateProduct() {
            this.createProduct.data.push({
                name: '',
                value: '',
            });
        },
        deleteAttributeFromCreateProduct(attributeIndex) {
            this.createProduct.data = this.createProduct.data.filter((item, index) => index !== attributeIndex);
        },
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
        storeProduct(callback) {
            return axios.post('/api/products', this.createProduct, {
                headers: {
                    "Content-Type": "application/json"
                }
            })
                .then(() => {
                    this.validationErrors = [];
                    this.createProduct.article = '';
                    this.createProduct.name = '';
                    this.createProduct.status = STATUSES[0].value;
                    this.createProduct.data = [];

                    callback();
                })
                .catch((error) => {
                    if (error.response && error.response.status === 422) {
                        console.log(error.response.data.errors);
                        this.validationErrors = error.response.data.errors;
                    } else {
                        console.log(error);
                    }
                })
        },
    }
})
