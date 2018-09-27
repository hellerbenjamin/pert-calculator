<template>

    <div id="calculator">
        <label>
            Optimistic
            <input type="number" name="optimistic"
                   v-model.number="inputs.optimistic"
                   v-on:change="updateTotal"
            />
        </label>

        <label>
            Typical
            <input type="number" name="typical"
                   v-model.number="inputs.typical"
                   v-on:change="updateTotal"
            />

        </label>

        <label>
            Pessimistic
            <input type="number" name="pessimistic"
                   v-model.number="inputs.pessimistic"
                   v-on:change="updateTotal"
            />
        </label>

        <div id="result" v-bind:class="this.totalValid ? 'total' : 'warning'">
            Pert Total
            <div class="warning">Please enter estimates to receive a total</div>
            <div class="total"></div>
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

                inputsValid: false,
                total: 0,
                totalValid: false

            }
        },

        methods: {
            updateTotal() {
                this.validateInputs();

                let total = (this.inputs.optimistic + 4 * this.inputs.typical + this.inputs.pessimistic) / 6

                if (typeof total === 'number' && this.inputsValid === true) {
                    this.total = total;
                    this.totalValid = true;
                }
            },

            validateInputs() {
                let inputs = this.inputs;

                for (let key in inputs) {
                    if (inputs[key] === 0 || typeof inputs[key] !== 'number' || this.isAbsolute( inputs[key]) === false) {
                        this.inputsValid = false;
                        return;
                    }
                }

                this.inputsValid = true;
            },

            isAbsolute(input) {
                if (typeof input !== 'number') {
                    return false;
                }

                let abs = Math.abs(input);
                return (abs === input);
            }
        }


    }
</script>

<style>
    #calculator {
        max-width: 800px;
        margin: 0 auto;
        background: #56CBF9;
        padding: 1em;
    }

    #calculator label {
        display: block;
        padding: 1em 0;
    }

</style>
