<template>
  <b-input-group class="mt-3">
    <span class="color-picker__desc">{{ section_name }}</span>
    <div class="color-picker__input-wrapper">
      <b-form-input
        class="color-picker__input"
        v-model="colorValue"
        @focus="showPicker()"
        @input="updateFromInput"
      ></b-form-input>
      <b-input-group-append>
        <b-button class="color-picker__button" variant="primary">
          <span
            class="current-color"
            :style="'background-color: ' + colorValue"
            @click="togglePicker()"
          ></span>
        </b-button>
        <chrome-picker
          :value="colors"
          @input="updateFromPicker"
          v-if="displayPicker"
        ></chrome-picker>
      </b-input-group-append>
    </div>
  </b-input-group>
</template>
<style>
.vc-chrome {
  position: absolute;
  top: 60px;
  right: -38px;
  z-index: 9;
}
.current-color {
  display: block;
  width: 38px;
  height: 38px;
  background-color: #000;
  cursor: pointer;
  border-radius: 3px;
}
.color-picker__input-wrapper {
  display: flex;
}
.color-picker__input {
  border-top-right-radius: 0;
  border-bottom-right-radius: 0;
}
.color-picker__button {
  padding: 0;
  border: none;
  border-top-left-radius: 0;
  border-bottom-left-radius: 0;
}
</style>
<script>
import { Chrome } from 'vue-color';

export default {
  components: {
    'chrome-picker': Chrome
  },
  props: {
    color: {
      type: String,
      default: '#000000'
    }
  },
  data() {
    return {
      colors: {
        hex: '#000000'
      },
      colorValue: '',
      displayPicker: false
    };
  },
  watch: {
    colorValue(val) {
      if (val) {
        this.updateColors(val);
        this.$emit('input', val);
      }
    },

    color: function(newVal) {
      this.setColor(newVal);
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
      if (color.slice(0, 1) == '#') {
        this.colors = {
          hex: color
        };
      } else if (color.slice(0, 4) == 'rgba') {
        var rgba = color.replace(/^rgba?\(|\s+|\)$/g, '').split(','),
          hex =
            '#' +
            (
              (1 << 24) +
              (parseInt(rgba[0]) << 16) +
              (parseInt(rgba[1]) << 8) +
              parseInt(rgba[2])
            )
              .toString(16)
              .slice(1);

        this.colors = {
          hex: hex,
          a: rgba[3]
        };
      }
    },
    showPicker() {
      document.addEventListener('click', this.documentClick);
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
      if (color.rgba.a == 1) {
        this.colorValue = color.hex;
      } else {
        this.colorValue =
          'rgba(' +
          color.rgba.r +
          ', ' +
          color.rgba.g +
          ', ' +
          color.rgba.b +
          ', ' +
          color.rgba.a +
          ')';
      }
    },
    documentClick(e) {
      var el = this.$refs.colorpicker;

      let target = e.target;
      if (el !== target && !el.contains(target)) {
        this.hidePicker();
      }
    }
  }
};
</script>
