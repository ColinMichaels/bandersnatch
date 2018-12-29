<template>
    <section class="section game">
        <div class="top-bar active"></div>
            <Screen></Screen>
        <div class="bottom-bar active"></div>
    </section>
</template>

<script>

    import Screen from './partials/ScreenComponent.vue'

    export default {
        props: {
            isLoaded: {
                type: Boolean,
                default: false
            }
        },
        components: {
           Screen
        },
        methods: {}
    }
</script>
