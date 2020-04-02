<template>
  <div>
    <div>
      <b-card no-body>
        <b-tabs pills card>
          <b-tab title="Для аднаразовых плацяжоў" active>
            <b-card-text>
              <div v-for="notification in notifications">
                <div v-if="notification.regular === 0">
                  <h2>{{ notification.title }}</h2>
                  <small>{{ notification.purpose}}</small>/<small>{{ notification.regular}}</small>
                  <p>{{ notification.body }}</p><br><hr><br>
                </div>
              </div>
            </b-card-text>
          </b-tab>
          <b-tab title="Для падпісак">
            <b-card-text>
              <div v-for="notification in notifications">
                <div v-if="notification.regular === 1">
                  <h2>{{ notification.title }}</h2>
                  <small>{{ notification.purpose}}</small>/<small>{{ notification.regular}}</small>
                  <p>{{ notification.body }}</p><br><hr><br>
                </div>
              </div>
            </b-card-text>
          </b-tab>
        </b-tabs>
      </b-card>
    </div>
  </div>
</template>
<script>

//the follow string should be moved into a global declaration
import axios from 'axios'

export default {
  data() {
    return {
     'notifications': this.notifications,
    }
  },
  // get all items (notifications) only after component mounted and created
  created() {
    axios.get(this.$app.route('dashboard.notifications.index'))
    .then(({data}) => {
        //console.log(data);
        return this.notifications = data;
    })
  },
  methods: {
  }
}
</script>
