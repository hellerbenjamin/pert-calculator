<template>

    <div id="calculator">
        <h1>Pert Calculator</h1>
        <p id="instructions">Input the number of hours you expect the project to take below</p>
        <label>
            Optimistic Estimate
            <input type="number" name="optimistic"
                   v-model.number="inputs.optimistic"
                   v-on:change="updateTotal"
            />
        </label>

        <label>
            Typical Estimate
            <input type="number" name="typical"
                   v-model.number="inputs.typical"
                   v-on:change="updateTotal"
            />

        </label>

        <label>
            Pessimistic Estimate
            <input type="number" name="pessimistic"
                   v-model.number="inputs.pessimistic"
                   v-on:change="updateTotal"
            />
        </label>

        <div id="result" v-bind:class="this.totalValid ? 'valid' : 'notValid'">
            <span>Pert Total</span>
            <div class="warning">Please enter number estimates greater than zero to receive a total</div>
            <div class="total">{{ this.total }}</div>
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

                let total = (this.inputs.optimistic + 4 * this.inputs.typical + this.inputs.pessimistic) / 6;
                total = Math.round(total * 10)/10;

                if (typeof total === 'number' && this.inputsValid === true) {
                    this.total = total;
                    this.totalValid = true;
                }
            },

            validateInputs() {
                let inputs = this.inputs;

                for (let key in inputs) {
                    if (inputs[key] === 0 || typeof inputs[key] !== 'number' || this.isAbsolute(inputs[key]) === false) {
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


<style lang="scss">
    $dark: #4C4B4B;
    $light: #eeeeee;
    $light-border: lighten( $dark, 10%);
    $warning: #F65350;

    #calculator {
        color: $light;
        max-width: 800px;
        margin: 0 auto;
        background: $dark;
        padding: 1em;
        border-radius: 3px;

        h1,p {
            margin: 0;
            padding: 0;
        }

        #instructions {
            font-size: .8em;
            margin-bottom: 1.5em;
        }

        label {
            display: block;

            input {
                text-align: center;
                width: 50px;
                color: $light;
                float: right;
                border: none;
                border-bottom: 1px solid $light-border;
                background: transparent;
            }
        }

        #result {
            margin-top: 2em;
            display: block;
            border-top: 1px solid $light;

            .warning {
                color: $warning;
                display: block;
            }
            
            span {
                display: none;
            }

            .total {
                display: none;
                float: right;
            }

            &.valid {
                .warning {
                    display: none;
                }

                .total {
                    display: block;
                }

                span {
                    display: inline;
                }
             }
        }
    }




</style>
