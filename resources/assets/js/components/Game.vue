<template>
    <section class="section game">
        <div class="top-bar"></div>
        <Screen></Screen>
        <div class="bottom-bar active">
            <div class="container">
                <Choice v-for="choice in choices" :key="choice.id" :action="choice.action" :text="choice.text" :obj-type="choice.objType" ></Choice>
            </div>
        </div>
    </section>
</template>
<script>

    import Screen from './partials/ScreenComponent'
    import Choice from './partials/ChoiceComponent'
    import {Howl, Howler} from 'howler';
    import { EventBus } from '../event-bus.js'

    let beep_yes = new Howl({ src: ['/audio/comp_beep_yes.mp3']});
    let beep_no = new Howl({ src: ['/audio/comp_beep_no.mp3']});
    let beep_typing = new Howl({ src: ['/audio/comp_beep_typing.mp3']});
    let music = new Howl({
        src: ['/audio/Lee_Rosevere_-_01_-_Sleep_Trance.mp3'],
        autoplay: true,
        loop: true,
        volume: 0.5
    });
    Howler.volume(0.5);
    music.load();


    export default {
        data() {
            return {
                choices: [
                    {
                        id : 1,
                        text: 'Yes',
                        action: 1,
                        objType: 'text'
                    },
                    {
                        id: 2,
                        text: 'No',
                        action: 2,
                        objType: 'text'
                    }
                    // ,{
                    //     id:3,
                    //     text: 'https://place-hold.it/300x500/666/fff/000.gif',
                    //     action: false,
                    //     objType: 'img'
                    // }
                    ,{
                        id:3,
                        text: 'Am I?',
                        action: 3,
                        objType: 'text'
                    }
                ],
                responses:[
                    {
                        type: 1,
                        text: "It is certain"
                    },
                    {
                        type: 1,
                        text: 'It is decidedly so.'
                    },
                    {
                        type: 1,
                        text: 'Without a doubt.'
                    },
                    {
                        type: 1,
                        text: 'Yes - definitely.'
                    },
                    {
                        type: 1,
                        text: 'You may rely on it.'
                    },
                    {
                        type: 2,
                        text: ' Reply hazy, try again.'
                    },
                    {
                        type: 2,
                        text: 'Reply hazy, try again.'
                    },
                    {
                        type: 2,
                        text: 'Better not tell you now.'
                    },
                ]
            }
        },
        props: {
            isLoaded: {
                type: Boolean,
                default: false
            }

        },
        components: {
            Screen, Choice
        },
        methods: {
            updateMessage(action){
                EventBus.$emit('update-console', '... LISTENING');
                beep_yes.play();
                if(action  === 1){
                    EventBus.$emit('update-message', "I'm glad you feel that way");
                }else if(action ===2){
                    EventBus.$emit('update-message', 'Ask me a question then. Just type it.');
                }else{
                    EventBus.$emit('update-message', "Why don't you try again");
                }
                EventBus.$emit('update-input', 'clear');
            }
        },
        mounted(){
            EventBus.$on('action-choice', this.updateMessage);   

            music.play();

            let self = this;

            window.addEventListener('keyup', function(ev) {
                let self = this;
                let keyCode = String.fromCharCode(ev.keyCode);

                if(ev.keyCode === 32) beep_no.play();

                if (/^[A-Za-z0-9 ]*[A-Za-z0-9][A-Za-z0-9 ]*$/.test(keyCode)) {
                    // self.myMethod(ev); // declared in your component methods

                    beep_typing.stop();
                    beep_typing.play();;
                    EventBus.$emit('update-input', ev.key);
                }

            });
        }
    }
</script>
