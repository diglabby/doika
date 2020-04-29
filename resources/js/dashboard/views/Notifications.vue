<template>
  <div>
    <div>
      <b-card no-body>
        <b-tabs pills card>
          <b-tab title="Для аднаразовых плацяжоў" active>
            <b-card-text>
              <div v-for="notification in notifications">
                <div v-if="notification.regular === 0">

                  <div>
                    <h2 class="mt-4">{{ notification.title }}</h2>
                    <b-tabs content-class="mt-3">
                      <b-tab title="Апісаннне" active>
                        <p>{{ notification.body }}</p><br><hr><br>
                      </b-tab>
                      <b-tab title="Рэдагаваць">
                        <notifications-form :notification="notification"
                                             :key="notification.id"
                                             @submitted="editForm"></notifications-form>
                      </b-tab>
                    </b-tabs>
                  </div>
                </div>
              </div>
            </b-card-text>
          </b-tab>
          <b-tab title="Для падпісак">
            <b-card-text>
              <div v-for="(notification, index) in notifications">
                <div v-if="notification.regular === 1">
                  <div>
                    <h2 class="mt-4">{{ notification.title }}</h2>
                    <b-tabs content-class="mt-3">
                      <b-tab title="Апісаннне" active>
                        <p>{{ notification.body }}</p><br><hr><br>
                      </b-tab>
                      <b-tab title="Рэдагаваць">
                        <notifications-form :notification="notification"
                                             :key="notification.id"
                                             @submitted="editForm"></notifications-form>
                      </b-tab>
                    </b-tabs>
                  </div>


                </div>
              </div>
            </b-card-text>
          </b-tab>
          <b-tab title="Наладкі рассыльшчыка">
            <h2>Спіс опцый для рассылкі паведамленняў (магчыма выкарыстаць трэці сэрвіс sendgrid?)</h2>
          </b-tab>
        </b-tabs>
      </b-card>
    </div>




  </div>
</template>
<script>

//the follow string should be moved into a global declaration
import axios from 'axios'
import NotificationsForm from './NotificationsForm.vue'

export default {
  data() {
    return {
     'notifications': this.notifications,
    }
  },

  components: {
    NotificationsForm
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

    //edit particula record in notification list
    editForm (data) {
        axios.put(this.$app.route('dashboard.notifications.update', { notification: data.id }), data)
            .then(({ data }) => {

              window.swal("Поспех", "Запіс абноўлены", "success", {
                timer: 2000,
                buttons: false,
              })

            })
            // needs to be developed
            .catch( ({ response }) => {

              window.swal("Праблемы", "Нешта пайшло не так", "error", {
                timer: 2000,
                buttons: false,
              })
              //console.log(response);

            });

    }
  }
}
</script>
