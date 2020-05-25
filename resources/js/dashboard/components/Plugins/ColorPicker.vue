<template>
    <b-input-group class="mt-3 colorpicker">
        <p class="colorpicker__desc">{{ section_name }}</p>
        <b-form-input class="colorpicker__input" v-model="colorValue" @click="togglePicker" @input="updateFromInput"></b-form-input>
        <b-input-group-append>
            <b-button class="color-picker__button" variant="primary"><span class="current-color" :style="'background-color: ' + colorValue" @click="togglePicker"></span></b-button>
                <chrome-picker :value="colors" @input="updateFromPicker" v-if="displayPicker"></chrome-picker>
                <a href="#" v-if="displayPicker" class="colorpicker__close-btn" @click.prevent="hidePicker"><i class="nav-icon fe fe-x"></i></a>
        </b-input-group-append>
    </b-input-group>
</template>

<script>

import { Chrome } from 'vue-color'

export default {
    components: {
        'chrome-picker': Chrome,
    },
    props: ['color', 'section_name'],
    data() {
        return {
            colors: {
                hex: '#000000',
            },
            colorValue: '',
            displayPicker: false,
        }
    },
    mounted() {
        this.setColor(this.color || '#000000');
    },
    methods: {
        setColor(color) {
            this.updateColors(color);
            this.colorValue = color;
        },

        updateColors(color) {
            if(color.slice(0, 1) == '#') {
                this.colors = {
                    hex: color
                };
            }
            else if(color.slice(0, 4) == 'rgba') {

                var rgba = color.replace(/^rgba?\(|\s+|\)$/g,'').split(','),
                hex = '#' + ((1 << 24) + (parseInt(rgba[0]) << 16) + (parseInt(rgba[1]) << 8) + parseInt(rgba[2])).toString(16).slice(1);

                this.colors = {
                    hex: hex,
                    a: rgba[3],
                }
            }
        },
        showPicker() {
            setTimeout(() => {
                document.addEventListener('click', this.documentClick);
            }, 0)
            this.displayPicker = true;
        },
        hidePicker() {
            document.removeEventListener('click', this.documentClick);
            this.displayPicker = false;
        },
        togglePicker() {
            this.displayPicker ? this.hidePicker() : this.showPicker();
        },
        updateFromInput() {
            this.updateColors(this.colorValue);
        },
        updateFromPicker(color) {
            this.colors = color;
            if(color.rgba.a == 1) {
                this.colorValue = color.hex;
            }
            else {
                this.colorValue = 'rgba(' + color.rgba.r + ', ' + color.rgba.g + ', ' + color.rgba.b + ', ' + color.rgba.a + ')';
            }
        },
        documentClick(e) {
            if(this.displayPicker && !e.target.closest(".vc-chrome")) {
                this.hidePicker()
        }}
    },
    watch: {
        colorValue(val) {
            if(val) {
                this.updateColors(val);
                this.$emit('input', val);
            }
        },
    },
};
</script>

<style lang="scss">
    .input-group-append {
        @media(max-width: 590px) {
                grid-area: button;
            }
            & > .btn {
                border-radius: 0 3px 3px 0;
                @media(max-width: 590px)  {
                    width: 100%;
                    border-radius: 0 0 3px 0;
                }
            }

    }
    .colorpicker {
        display: grid;
        grid-template-columns: 190px 100px 30px;
        @media(max-width: 590px)  {
            grid-template-columns: 1fr 1fr;
            grid-template-areas: 
            "desc desc"
            "input button";
        }
        @media(max-width: 400px) {
            grid-template-columns: repeat(4, 1fr);
            grid-template-areas: 
            "desc desc desc desc"
            "input input input button";
        }
        &__desc {
            display: flex;
            align-items: center;
            margin: 0;
            padding-left: 10px;
            border: 1px solid rgba(0, 40, 100, 0.12);
            border-right: none;
            border-radius: 3px 0 0 3px;
            background-color:rgba(0, 0, 0, 0.02);
            @media(max-width: 590px) {
                grid-area: desc;
                height: 36px;
                border-right: 1px solid rgba(0, 40, 100, 0.12);
                border-bottom: none;
                border-radius: 3px 3px 0 0;
            }
            @media(max-width: 400px) {
                height: 45px;
            }
            }
        &__input {
            width: 100% !important;
            @media(max-width: 590px) {
                grid-area: input;
                border-radius: 0 0 0 3px !important;
            }
        }
        &__close-btn {
            position: absolute;
            display: flex;
            top: 40px;
            left: 330px;
            width: 40px;
            height: 40px;
            z-index: 10;
            transition: 300ms;
            &:hover {
                transform: rotateZ(90deg);
            }
            & > i {
                color: #000000;
                font-size: 40px;
            }
        }
        }
    .vc-chrome {
        position: absolute;
        top: 40px;
        left: 100px;
        z-index: 9;
    }
    .current-color {
        display: block;
        width: 38px;
        height: 38px;
        background-color: #000;
        cursor: pointer;
        border-radius: 0 3px 3px 0;
        @media(max-width: 590px) {
            width: 100%;
            border-radius: 0 0 3px 0;
        }
    }
    .color-picker__button {
        padding: 0;
        border: none;
    }
</style>