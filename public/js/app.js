import { createApp } from 'https://unpkg.com/vue@3/dist/vue.esm-browser.js'

createApp({
    data() {
        return {
            messageUtilisateur: true,
            nomFichier: "Aucune image sélectionnée"
        }
    },
    methods: {
        /**
         * Ferme le message affiché à l'utilisateur.
         */
        fermerMessage() {
            this.messageUtilisateur = false
        },
        /**
         * Gère la sélection d'un fichier par l'utilisateur.
         * 
         * @param Event event 
         */
        contenirFichier(e) {
            const fichier = e.target.files[0]
            this.nomFichier = fichier ? fichier.name: ""
        }
    }
}).mount('#app')