<template>
    <b-input-group class="mt-3 colorpicker">
        <p class="colorpicker__desc">{{ section_name }}</p>
        <b-form-input ref="input" class="colorpicker__input" v-model="colorRgba" @input="updateFromInput"></b-form-input>
        <b-input-group-append>
            <b-button class="color-picker__button" variant="primary"><span class="current-color" :style="'background-color: ' + colorRgba" @click="togglePicker"></span></b-button>
                <chrome-picker :value="colors" @input="updateFromPicker" v-if="displayPicker"></chrome-picker>
                <button v-if="displayPicker" class="colorpicker__close-btn" @click.prevent="hidePicker"><i class="nav-icon fe fe-x"></i></button>
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
            colorRgba: '',
            displayPicker: false,
        }
    },
    mounted() {
        this.setColor(this.color || '#000000');
    },
    methods: {
        setColor(color) {
            this.updateColors(color);
            this.colorRgba = color;
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
            this.$refs.input.focus()
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
            this.updateColors(this.colorRgba);
        },
        updateFromPicker(color) {
            this.colors = color;
            if(color.rgba.a == 1) {
                this.colorRgba = color.hex;
            }
            else {
                this.colorRgba = 'rgba(' + color.rgba.r + ', ' + color.rgba.g + ', ' + color.rgba.b + ', ' + color.rgba.a + ')';
            }
        },
        documentClick(e) {
            if(this.displayPicker && !e.target.closest(".vc-chrome") && !e.target.classList.contains("colorpicker__input")) {
                this.hidePicker()
        }}
    },
    watch: {
        colorRgba(val) {
            if(val) {
                this.updateColors(val);
                this.$emit('input', val);
            }
        },
    },
};
</script>

<style>

.input-group-append > .btn {
    border-radius: 0 3px 3px 0;
}


.colorpicker {
    display: grid;
    grid-template-columns: 190px 100px 30px;
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
}

.color-picker__button {
    padding: 0;
    border: none;
}

.colorpicker__desc {
    display: flex;
    align-items: center;
    margin: 0;
    padding-left: 10px;
    border: 1px solid rgba(0, 40, 100, 0.12);
    border-right: none;
    border-radius: 3px 0 0 3px;
    background-color:rgba(0, 0, 0, 0.02);
}

.colorpicker__input {
    width: 100% !important;
}

.colorpicker__close-btn {
    position: absolute;
    display: flex;
    align-items: center;
    justify-content: center;
    top: 40px;
    left: 330px;
    width: 40px;
    height: 40px;
    z-index: 10;
    transition: 300ms;
    border: none;
    background-color: transparent;
    outline: none !important;
}

.colorpicker__close-btn:hover {
    transform: rotateZ(90deg);
}

.colorpicker__close-btn > i {
    color: #000000;
    font-size: 40px;
}

@media(max-width: 590px) {
    .input-group-append {
        grid-area: button;
    }
    .input-group-append > .btn {
        width: 100%;
        border-radius: 0 0 3px 0;
    }
    .colorpicker {
        grid-template-columns: 1fr 1fr;
        grid-template-areas: 
        "desc desc"
        "input button";
    }
    .colorpicker__desc {
        grid-area: desc;
        height: 36px;
        border-right: 1px solid rgba(0, 40, 100, 0.12);
        border-bottom: none;
        border-radius: 3px 3px 0 0;
    }
    .colorpicker__input {
        grid-area: input;
        border-radius: 0 0 0 3px !important;
    }
    .current-color {
        width: 100%;
        border-radius: 0 0 3px 0;
    }
}

@media(max-width: 400px) {
    .colorpicker {
        grid-template-columns: repeat(4, 1fr);
        grid-template-areas: 
        "desc desc desc desc"
        "input input input button";
    }
    .colorpicker__desc {
        height: 45px;
    }
}

</style>