<template>
  <div>
    <form @submit.prevent="onSubmit">
      <b-row class="justify-content-center">
        <b-col xl="6">
          <b-card>
            <h3 class="card-title" slot="header">{{ isNew ? $t('labels.admin.payments.create.title') : $t('labels.admin.payments.show.title') }}</h3>

            <b-form-group
              :label="$t('labels.admin.payments.campaign')"
              label-for="campaign"
              horizontal
              :label-cols="3"
              :feedback="feedback('campaign')"
            >
              <b-form-input
                id="campaign"
                name="campaign"
                :placeholder="$t('labels.admin.payments.placeholder.campaign')"
                v-model="model.campaign"
                :state="state('campaign')"
              ></b-form-input>
            </b-form-group>

            <b-form-group
              :label="$t('labels.admin.payments.backer')"
              label-for="backer"
              horizontal
              :label-cols="3"
              :feedback="feedback('backer')"
            >
              <b-form-input
                id="backer"
                name="backer"
                :placeholder="$t('labels.admin.payments.placeholder.backer')"
                v-model="model.backer"
                :state="state('backer')"
              ></b-form-input>
            </b-form-group>

            <b-form-group
              :label="$t('labels.admin.payments.amount')"
              label-for="amount"
              horizontal
              :label-cols="3"
              :feedback="feedback('amount')"
            >
              <b-form-input
                id="amount"
                name="amount"
                :placeholder="$t('labels.admin.payments.placeholder.amount')"
                v-model="model.amount"
                :state="state('amount')"
              ></b-form-input>
            </b-form-group>

            <b-form-group
              :label="$t('labels.admin.payments.date')"
              label-for="date"
              horizontal
              :label-cols="3"
              :feedback="feedback('date')"
            >
              <b-form-input
                id="date"
                name="date"
                :placeholder="$t('labels.admin.payments.placeholder.date')"
                v-model="model.date"
                :state="state('date')"
              ></b-form-input>
            </b-form-group>

            <b-form-group
              :label="$t('labels.admin.payments.status')"
              label-for="status"
              horizontal
              :label-cols="3"
              :feedback="feedback('status')"
            >
              <b-form-input
                id="status"
                name="status"
                :placeholder="$t('labels.admin.payments.placeholder.status')"
                v-model="model.status"
                :state="state('status')"
              ></b-form-input>
            </b-form-group>

            <b-row slot="footer">
              <b-col col-lg="3">
                <b-button to="/payments" exact variant="danger" size="sm">
                  {{ $t('buttons.admin.common.back') }}
                </b-button>
              </b-col>
              <b-col offset-lg="4" col-lg="3">
                <b-button type="submit" variant="success" size="sm" class="float-left"
                          :disabled="pending"
                          v-if="isNew || $app.user.can('edit metas')" style="margin-right: 10px"
                >
                  {{ $t('buttons.admin.common.print') }}
                </b-button>
                <b-button type="submit" variant="success" size="sm" class="float-right"
                          :disabled="pending"
                          v-if="isNew || $app.user.can('edit metas')"
                >
                  {{ $t('buttons.admin.common.email') }}
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
  name: 'PaymentForm',
  mixins: [form],
  data() {
    return {
      routes: [],
      modelName: 'payment',
      resourceRoute: 'payments',
      listPath: '/payments',
      model: {
        metable_type: null,
        metable_id: null,
        route: null,
        title: null,
        description: null
      }
    }
  },
  created() {
    this.fetchRoutes()
  },
  methods: {
    async fetchRoutes() {
      let { data } = await axios.get(this.$app.route('admin.routes.search'))
      this.routes = data.items
    }
  }
}
</script>
