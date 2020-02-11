<template>
    <div
        class="alert"
        v-bind:class="{ 'alert-success': alert.success, 'alert-danger': !alert.success }"
    >
        {{alert.message}}
    </div>
</template>

<script>
    export default {
        name: 'Alert',
        props: ['alert'],
        mounted() {
            console.log('Component mounted (components/Alert.vue).')
        },
        data() {
            return {}
        }
    }
</script>
