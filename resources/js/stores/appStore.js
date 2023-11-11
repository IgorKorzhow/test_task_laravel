import {defineStore} from "pinia";

export const useAppStore = defineStore('appStore', {
    state: () => ({
        isShowModal: false,
    }),
    actions: {
        openModal() {
            this.isShowModal = true;
            document.body.style.overflow = 'hidden';
        },
        closeModal() {
            this.isShowModal = false;
            document.body.style.overflow = 'visible';
        }
    }
})
