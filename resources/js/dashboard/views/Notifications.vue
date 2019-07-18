<template>
  <div>
    <form @submit.prevent="onSubmit">
      <b-row>
        <b-col xl="12">
          <b-card>
            <b-card no-body class="mb-0">
              <b-card-header header-tag="header" role="tab">
                <h5 class="card-title">
                  <a href="#" v-b-toggle.notifications>
                    {{ $t('labels.admin.settings.notifications.header') }}
                  </a>
                </h5>
              </b-card-header>
              <b-collapse id="notifications" aria-expanded="true" visible role="tabpanel">
                <div>
                  <b-tabs>
                    <b-tab :title= "$t('labels.emailserver')" active>
                      <b-card-body>
                        <b-row>
                          <b-col md>
                            <b-form-group
                              :label="$t('labels.admin.settings.notifications.address')"
                              label-for="notificationsAddress"
                              horizontal
                              :label-cols="4"
                              :feedback="feedback('title')"
                            >
                              <b-form-input
                                id="notificationsAddress"
                                name="title"
                                required
                                :placeholder="$t('labels.admin.settings.notifications.placeholder.address')"
                                v-model="model.settings.notificationsAddress"
                                :state="state('title')"
                              ></b-form-input>
                            </b-form-group>
                          </b-col>
                          <b-col md>
                            <b-form-group
                              :label="$t('labels.admin.settings.notifications.port')"
                              label-for="notificationsPort"
                              horizontal
                              :label-cols="4"
                              :feedback="feedback('title')"
                            >
                              <b-form-input
                                id="notificationsPort"
                                name="title"
                                required
                                :placeholder="$t('labels.admin.settings.notifications.placeholder.port')"
                                v-model="model.settings.notificationsPort"
                                :state="state('title')"
                              ></b-form-input>
                            </b-form-group>
                          </b-col>
                        </b-row>
                        <b-row>
                          <b-col md>
                            <b-form-group
                              :label="$t('labels.admin.settings.notifications.user')"
                              label-for="notificationsUser"
                              horizontal
                              :label-cols="4"
                              :feedback="feedback('title')"
                            >
                              <b-form-input
                                id="notificationsUser"
                                name="title"
                                required
                                :placeholder="$t('labels.admin.settings.notifications.placeholder.user')"
                                v-model="model.settings.notificationsUser"
                                :state="state('title')"
                              ></b-form-input>
                            </b-form-group>
                          </b-col>
                          <b-col md>
                            <b-form-group
                              :label="$t('labels.admin.settings.notifications.password')"
                              label-for="notificationsPassword"
                              horizontal
                              :label-cols="4"
                              :feedback="feedback('title')"
                            >
                              <b-form-input
                                id="notificationsPassword"
                                name="title"
                                required
                                :placeholder="$t('labels.admin.settings.notifications.placeholder.password')"
                                v-model="model.settings.notificationsPassword"
                                :state="state('title')"
                              ></b-form-input>
                            </b-form-group>
                          </b-col>
                        </b-row>
                      </b-card-body>
                    </b-tab>
                    <b-tab :title = "$t('labels.recurrent')">
                      <b-card-body>
                        <b-row>
                          <b-col lg="6">
                            <b-form-group
                              :label="$t('labels.admin.settings.notifications.email')"
                              label-for="notificationsEmail"
                              horizontal
                              :label-cols="4"
                              :feedback="feedback('title')"
                            >
                              <b-form-input
                                id="notificationsEmail"
                                name="title"
                                required
                                :placeholder="$t('labels.admin.settings.notifications.placeholder.email')"
                                v-model="model.settings.notificationsEmail"
                                :state="state('title')"
                              ></b-form-input>
                            </b-form-group>
                          </b-col>
                        </b-row>
                        <b-form-group
                          :label="$t('labels.admin.settings.notifications.reccurentTemplate')"
                          label-for="reccurent"
                          horizontal
                          :label-cols="2"
                        >
                          <vue-editor
                                  id="reccurent"
                            name="messageReccurent"
                            v-model="model.settings.messageReccurentTransaction"
                          ></vue-editor>
                        </b-form-group>
                      </b-card-body>
                    </b-tab>
                    <b-tab :title = "$t('labels.single')">
                      <b-card-body>
                        <b-row>
                          <b-col lg="6">
                            <b-form-group
                              :label="$t('labels.admin.settings.notifications.email')"
                              label-for="notificationsSingleEmail"
                              horizontal
                              :label-cols="4"
                              :feedback="feedback('title')"
                            >
                              <b-form-input
                                id="notificationsSingleEmail"
                                name="title"
                                required
                                :placeholder="$t('labels.admin.settings.notifications.placeholder.email')"
                                v-model="model.settings.notificationsSingleEmail"
                                :state="state('title')"
                              ></b-form-input>
                            </b-form-group>
                          </b-col>
                        </b-row>
                        <b-form-group
                          :label="$t('labels.admin.settings.notifications.singleTemplate')"
                          label-for="single"
                          horizontal
                          :label-cols="2"
                        >
                          <vue-editor
                                  id="single"
                            name="messageSingle"
                            v-model="model.settings.messageSingleTransaction"
                          ></vue-editor>
                        </b-form-group>
                      </b-card-body>
                    </b-tab>
                  </b-tabs>
                </div>
              </b-collapse>
            </b-card>
            <b-row slot="footer">
              <b-col md>
              </b-col>
              <b-col md>
                <input name="status" type="hidden" value="publish">

                <b-button right split class="float-right" variant="success" @click="model.status = 'publish'; onSubmit()">
                  {{ $t('buttons.admin.common.apply') }}
                </b-button>
              </b-col>
            </b-row>
          </b-card>
        </b-col>
      </b-row>
    </form>
  </div>
</template>

<script>
import axios from 'axios'
import form from '../mixins/form'

export default {
  name: 'Notifications',
  mixins: [form],
  data() {
    return {
      modelName: 'settings',
      resourceRoute: 'settings',
      listPath: '/notifications',
      model: {
          settings: {
              notificationsAddress: null,
              notificationsPort: null,
              notificationsUser: null,
              notificationsPassword: null,
              notificationsEmail: null,
              notificationsSingleEmail:null,
              messageSingleTransaction: null,
              messageReccurentTransaction: null,
          }
      }
    }
  },
    mounted: function() {
        this.getCredentials()
    },
    methods: {
        async getCredentials() {
            let { data } = await axios.get(
                this.$app.route('dashboard.settings.index'),
                {
                    params:
                        {
                            keys:
                                ['notificationsAddress', 'notificationsPort', 'notificationsUser', 'notificationsPassword', 'notificationsEmail', 'messageSingleTransaction','messageReccurentTransaction']
                        }
                })

            this.model.settings = data.settings
        }
    }
}
</script>
