<template>
  <div>
    <form @submit.prevent="onSubmit">
      <b-row class="justify-content-center">
        <b-col xl="6">
          <b-card>
            <h3 class="card-title" slot="header">
              {{
                isNew
                  ? $t('labels.admin.payments.create.title')
                  : $t('labels.admin.payments.show.title')
              }}
            </h3>

            <b-form-group
              :label="$t('labels.admin.payments.campaign')"
              label-for="campaign"
              horizontal
              :label-cols="3"
              :feedback="feedback('campaign')"
              :readonly="true"
            >
              <b-form-input
                id="campaign"
                name="campaign"
                :placeholder="$t('labels.admin.payments.placeholder.campaign')"
                v-model="model.campaign"
                :state="state('campaign')"
                :readonly="true"
              ></b-form-input>
            </b-form-group>

            <b-form-group
              :label="$t('labels.admin.payments.backer')"
              label-for="backer"
              horizontal
              :label-cols="3"
              :feedback="feedback('backer')"
              :readonly="true"
            >
              <b-form-input
                id="backer"
                name="backer"
                :placeholder="$t('labels.admin.payments.placeholder.backer')"
                v-model="model.donator"
                :state="state('backer')"
                :readonly="true"
              ></b-form-input>
            </b-form-group>

            <b-form-group
              :label="$t('labels.admin.payments.amount')"
              label-for="amount"
              horizontal
              :label-cols="3"
              :feedback="feedback('amount')"
              :readonly="true"
            >
              <b-form-input
                id="amount"
                name="amount"
                :placeholder="$t('labels.admin.payments.placeholder.amount')"
                v-model="model.amount"
                :state="state('amount')"
                :readonly="true"
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
                v-model="model.created_at"
                :state="state('date')"
                :readonly="true"
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
                :readonly="true"
              ></b-form-input>
            </b-form-group>

            <b-row slot="footer">
              <b-col col-lg="3">
                <b-button
                  to="/transactions"
                  exact
                  variant="secondary"
                  size="sm"
                >
                  {{ $t('buttons.admin.common.back') }}
                </b-button>
              </b-col>
              <b-col offset-lg="4" col-lg="3">
                <b-button
                  type="submit"
                  variant="success"
                  size="sm"
                  class="float-left"
                  :disabled="pending"
                >
                  {{ $t('buttons.admin.common.print') }}
                </b-button>
                <b-button
                  type="submit"
                  variant="success"
                  size="sm"
                  class="float-right"
                  :disabled="pending"
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
import form from '../mixins/form';

export default {
  name: 'PaymentForm',
  mixins: [form],
  data() {
    return {
      id: null,
      routes: [],
      modelName: 'transaction',
      resourceRoute: 'transactions',
      listPath: '/transactions',
      model: {
        created_at: null,
        amount: null,
        donator: null,
        campaign: null,
        currency: null,
        status: null
      }
    };
  }
};
</script>
