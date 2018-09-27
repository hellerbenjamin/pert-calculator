<template>

    <div id="calculator">
        <label>
            Optimistic
            <input type="number" name="optimistic"
               v-model.number="inputs.optimistic"
            />
        </label>

        <label>
            Typical
            <input type="number" name="typical"
               v-model.number="inputs.typical"
            />

        </label>

        <label>
            Pessimistic
            <input type="number" name="pessimistic"
               v-model.number="inputs.pessimistic"
            />
        </label>

        <div id="result">

        </div>
    </div>


</template>

<script>

    export default {
        name: 'app',

        data() {
            return {
                inputs: {
                    'optimistic': 0,
                    'typical': 0,
                    'pessimistic': 0
                },
            }
        },

        mounted() {

        },

        methods: {



        }


    }
</script>

<style>
</style>
