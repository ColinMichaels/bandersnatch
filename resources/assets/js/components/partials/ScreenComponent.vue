<template>
    <section class="screen">
        <div class="container">
            <h2 :class="consoleClass" v-html="consoleMessage"></h2>
            <h1 :class="classEfx">{{message}}</h1>
            <h3>{{inputMessage}}</h3>
        </div>
    </section>
</template>

<script>
    let timeout = 100;
    import {EventBus} from '../../event-bus.js'

    export default {
        data() {
            return {
                message: '',
                classEfx: '',
                inputMessage: '',
                consoleMessage: '****** BANDERSNATCH ****** <br/> 64K RAM SYSTEM 38911 BASIC BYTES FREE',
                consoleClass: 'computer typewriter'
            }
        },

        props: {
            isLoaded: {
                type: Boolean,
                default: false
            }
        },
        methods: {
            updateMessage(message) {
                this.classEfx = 'hide';
                setTimeout(() => {
                    this.message = message;
                    this.classEfx = 'typewriter text-white';
                }, 100);

            },
            updateConsole(message){
                this.consoleMessage = message;
            },
            updateInput(message){
                if(message === 'clear' || message === '') {
                    this.inputMessage = '';
                }else{
                    this.inputMessage = this.inputMessage + message;
                }
            }
        },
        mounted() {
            EventBus.$on('update-message', this.updateMessage);
            EventBus.$on('update-console', this.updateConsole);
            EventBus.$on('update-input', this.updateInput);
            $('body, #game, .top-bar, .bottom-bar').addClass('dark');
        },
        created() {
            setTimeout(() => {

                this.updateMessage("**** welcome to Bandersnatch *****");
                setTimeout(() => {
                    $('.top-bar, .bottom-bar').removeClass('active');

                    setTimeout(() => {
                        $('.container').addClass('active');
                        this.updateInput('');
                        this.updateMessage("Do you believe you are in control of your own destiny?");
                    }, timeout * 3);


                }, timeout * 4);

            }, timeout * 5);

        }
    }
</script>
