import {defineStore} from "pinia";
import {STATUSES} from "@/constants/statuses.js";

export const useProductStore = defineStore('productStore', {
    state: () => ({
        products: null,
        originalProduct: null,
        changedProduct: null,
        validationErrors: {},
        per_page: -1,
        paginationInfo: Object,
    }),
    actions: {
        deleteAttributeFromProductData(attributeIndex) {
            this.changedProduct.data = this.changedProduct.data.filter((item, index) => index !== attributeIndex);
        },
        addAttributeToProductData() {
            this.changedProduct.data.push({
                name: '',
                value: '',
            })
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
        fetchProductById(productId) {
            this.freshProductInfo();
            return axios.get(`/api/products/${productId}`)
                .then(response => {
                    this.originalProduct = response.data;
                    this.changedProduct = {...response.data};
                })
        },
        storeProduct(callback) {
            return axios.post('/api/products', this.changedProduct, {
                headers: {
                    "Content-Type": "application/json"
                }
            })
                .then(() => {
                    this.fetchProducts();
                    this.freshProductInfo();

                    callback();
                })
                .catch((error) => {
                    if (error.response && error.response.status === 422) {
                        this.validationErrors = error.response.data.errors;
                    } else {
                        console.log(error);
                    }
                })
        },
        updateProduct(callback) {
            const changedFields = this.getOnlyChangedFields();
            return axios.put(`/api/products/${this.changedProduct.id}`, changedFields, {
                headers: {
                    "Content-Type": "application/json"
                }
            })
                .then(() => {
                    this.fetchProducts();
                    callback();
                })
                .catch((error) => {
                    if (error.response && (error.response.status === 422)) {
                        this.validationErrors = error.response.data.errors;
                        console.log(error.response);
                    } else if (error.response && (error.response.status === 403)) {
                        this.validationErrors.permissionError = error.response.data.message;
                    } else {
                        console.log(error)
                    }
                })
        },
        deleteProductById(callback) {
            axios.delete(`/api/products/${this.originalProduct.id}`)
                .then(() => {
                    this.freshProductInfo();
                    this.fetchProducts();

                    callback()
                })
        },
        getOnlyChangedFields() {
            const changedFields = {};
            for (const key in this.changedProduct) {
                if (Array.isArray(this.changedProduct[key])) {
                    changedFields[key] = this.changedProduct[key];
                } else if  (this.changedProduct[key] !== this.originalProduct[key]) {
                    changedFields[key] = this.changedProduct[key];
                }
            }
            return changedFields;
        },
        freshProductInfo() {
            this.changedProduct = null;
            this.originalProduct = null;
            this.validationErrors = {};
        },
        initializeNewProduct() {
            this.changedProduct = {
                name: '',
                article: '',
                status: STATUSES[0].value,
                data: []
            };
        }
    }
})
