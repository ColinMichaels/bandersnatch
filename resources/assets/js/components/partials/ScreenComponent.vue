<template>
    <div>
        <section class="screen">
            <h1>{{message}}</h1>
            <input class='hide' v-model="message"/>
        </section>

        <input>
    </div>
</template>

<script>

    export default {
        data() {
            return {
                message: ''
            }
        },

        props: {
            isLoaded: {
                type: Boolean,
                default: false
            }
        },
        created() {
            setTimeout(() => {
                console.log('timed');
                $('.screen').find('h1').addClass('typewriter');
                this.message = "welcome to Bandersnatch";
                setTimeout(() => {
                    $('.top-bar, .bottom-bar').removeClass('active');
                }, 1000);

            }, 1000);

        }
    }
</script>
