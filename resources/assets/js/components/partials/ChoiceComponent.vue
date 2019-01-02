<template>
        <button v-if="typeId === 1" type="button" class="choice" :action="action"
                :text="text" v-on:click.prevent="takeAction(action)">{{text}}
        </button>

        <img  v-else-if="typeId === 2" class="choice" :action="action" :src="text"  v-on:click.prevent="takeAction(action)" />
</template>

<script>
        import { EventBus } from '../../event-bus.js'
    export default {
        props: {
            text: '',
            action: '',
            typeId: ''
        },
        methods: {
            takeAction: function (action) {
                EventBus.$emit('action-choice', action);
            }
        }
    }
</script>
