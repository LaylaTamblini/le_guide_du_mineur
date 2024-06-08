import { createApp } from 'https://unpkg.com/vue@3/dist/vue.esm-browser.js'

createApp({
    data() {
        return {
            messageUtilisateur: true
        }
    },
    methods: {
        fermerMessage() {
            this.messageUtilisateur = false
        }
    }
}).mount('#app')