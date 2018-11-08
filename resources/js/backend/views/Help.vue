<template>
  <div>
    <b-card>
      <template slot="header">
        <h3 class="card-title">{{ $t('labels.admin.help.header') }}</h3>
      </template>
      <div>
        <ul id="helpList" style="list-style:none">
          <li v-for="item in help" :key="item.id" style="margin-top: 10px;">
            <b-btn v-b-toggle="'collapse-' + item.id" variant="primary">{{ item.title }}</b-btn>
            <b-collapse :id="'collapse-' + item.id" class="mt-2">
              <b-card>
                <p class="card-text">{{ item.text }}</p>
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
      ]
    }
  }
}
</script>
