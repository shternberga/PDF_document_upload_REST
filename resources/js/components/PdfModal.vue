<template>
    <div>
        <fullscreen :fullscreen.sync="fullscreen">
            <embed class="pdf" :src="`uploads/${fileInModal}`" :alt="fileInModal"/>
        </fullscreen>
    </div>
</template>

<script>
    export default {
        name: "PdfModal",
        mounted() {
            console.log('Component mounted (components/PdfModal.vue).');
            this.toggle();
        },
        props: {
            fileInModal: {}
        },
        data() {
            return {
                fullscreen: false
            }
        },
        methods: {
            toggle() {
                this.fullscreen = !this.fullscreen
            }
        }
    }
</script>

<style scoped>
    .pdf {
        background: #e9e9ea;
        padding: 5px;
        width: 100%;
        height: 1000px;
        margin: 10px;
    }
</style>
