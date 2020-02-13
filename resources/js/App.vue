<template>
    <div class="container">
    <Navigation/>
    <Gallery/>
    </div>
</template>

<script>
    import Navigation from "./components/Navigation";
    import Gallery from "./components/Gallery";
    export default {
        name: "App",
        components: {
            Navigation,
            Gallery
        },
        mounted() {
            console.log('Component mounted (components/App.vue).')
        },
        data() {
            return {}
        },
        methods: {}
    }
</script>
