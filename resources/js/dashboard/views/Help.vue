<template>
  <div>
    <b-card>
      <template slot="header">
        <h3 class="card-title">
          {{ $t('labels.admin.help.header') }}
        </h3>
      </template>
      <div>
        <ul id="helpList" style="list-style:none">
          <li
            v-for="item in help"
            :key="item.id"
            style="margin-top: 10px;"
            @click="provide(item)"
          >
            <p v-b-toggle="'collapse-' + item.id" variant="primary">
              <i
                class="fe"
                :class="
                  contains(buttons, item) ? 'fe-minus-circle' : 'fe-plus-circle'
                "
              ></i>
              {{ item.title }}
            </p>
            <b-collapse :id="'collapse-' + item.id" class="mt-2">
              <b-card>
                <p class="card-text">
                  {{ item.text }}
                </p>
              </b-card>
            </b-collapse>
          </li>
        </ul>
      </div>
    </b-card>
  </div>
</template>

<script>
export default {
  name: 'Help',
  data() {
    return {
      help: [
        {
          id: 1,
          title: 'Where am I?',
          text: 'Anywhere'
        },
        {
          id: 2,
          title: 'Why I am here?',
          text: 'For a reason'
        }
      ],
      buttons: []
    };
  },
  methods: {
    provide: function(item) {
      console.log(this.buttons);
      if (this.buttons.includes(item)) this.buttons.splice(item, 1);
      else this.buttons.push(item);
    },
    contains: function(arr, item) {
      return arr.indexOf(item) != -1;
    }
  }
};
</script>
