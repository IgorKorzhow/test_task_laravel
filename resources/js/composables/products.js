import {onMounted, ref} from 'vue'

export default function useProducts() {
    const products = ref([])

    const getProducts = async () => {
        axios.get('/api/products')
            .then(response => {
                products.value = response.data
            })
    }

    onMounted(() => {
        getProducts()
    })

    return { products, getProducts }
}
