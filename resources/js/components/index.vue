<template>
    <div class="container">
    <Navigation/>
    <Gallery/>
    </div>
</template>
<script>
    import Navigation from "./Navigation";
    import Gallery from "./Gallery";
    export default {
        name: "index",
        components: {
            Navigation,
            Gallery
        },
        mounted() {
            console.log('Component mounted (components/index.vue).')
        },
        data() {
            return {}
        },
        methods: {}
    }
</script>
