<template>
    <section class="section game">
        <div class="top-bar">
            <h4>Music Src: {{music_src}}</h4>
            <h4>Scene: {{scene_id}} | {{next_scene_id}}</h4>
        </div>
        <Screen></Screen>
        <div class="bottom-bar active">
            <div class="container">
                <Choice v-for="choice in choices" :key="choice.id" :action="choice.action" :text="choice.text" :type-id="choice.type_id" ></Choice>
            </div>
        </div>
    </section>
</template>
<script>

    import Screen from './partials/ScreenComponent'
    import Choice from './partials/ChoiceComponent'
    import {Howl, Howler} from 'howler';
    import { EventBus } from '../event-bus.js'

    const api = '/api/game';

    let beep_yes = new Howl({ src: ['/audio/comp_beep_yes.mp3']});
    let beep_no = new Howl({ src: ['/audio/comp_beep_no.mp3']});
    let beep_typing = new Howl({ src: ['/audio/comp_beep_typing.mp3']});
    let music =  new Howl({
        src: [this.music_src],
        autoplay: true,
        loop: true,
        volume: 0.5
    });

    Howler.volume(0.9);


    export default {
        data() {
            return {
                game: [],
                player_id: 1,
                scene_id: 1,
                next_scene_id: 1,
                music: [],
                music_src: '',
                question: '',
                choices: [],
                responses:[]
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
                EventBus.$emit('update-message', (this.responses[action-1])? this.responses[action-1].text: "Not sure what to say about that");
                EventBus.$emit('update-input', 'clear');
                this.next_scene_id =  (this.responses[action-1])? this.responses[action-1].next_scene_id: 1;
                music.fade(0.5, 0.0, 3000);
                setTimeout(()=>{
                    this.loadNextScene();
                },2000);
               
            },
            loadNextScene(){

                EventBus.$emit('update-console', '...THINKING');
                axios.get(api + '/scene/'+this.next_scene_id+'/'+this.player_id+'/'+this.scene_id).then(res => {
                    this.updateScene(res.data);
                }).catch(err => {
                    console.log(err);
                });
            },
            getGame(player_id){
                axios.get(api + '/player/'+player_id).then(res => {
                    this.updateScene(res.data);
                }).catch(err => {
                    console.log(err);
                });

            },
            updateScene(data){
                music.fade(0.0, 0.5, 2000);
                EventBus.$emit('update-console', '');
                this.game = data;
                let cur_game = this.game[0];
                this.choices = cur_game.choices;
                this.responses = cur_game.responses;
                this.music_src = cur_game.music;
                this.scene_id = cur_game.scene;
                this.question = cur_game.question;
                this.playMusic(music, '/audio/' + this.music_src);
                 EventBus.$emit('update-message', this.question);


            },
            playMusic(source, newSrc){
                //source.unload(true);
                // source.src = newSrc;
                source._src = newSrc;
                source.load();
                source.play();
            }
        },
        beforeMount(){
            this.getGame(this.player_id);
        },
        mounted(){
            EventBus.$on('action-choice', this.updateMessage);
            window.addEventListener('keyup', function(ev) {

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
