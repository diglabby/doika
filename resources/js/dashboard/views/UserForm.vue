<template>
  <div>
    <form @submit.prevent="onSubmit">
      <b-row class="justify-content-center">
        <b-col xl="6">
          <b-card>
            <h3 class="card-title" slot="header">{{ isNew ? $t('labels.admin.users.create.header') : $t('labels.admin.users.edit.header') }}</h3>

            <b-form-group
              :label="$t('labels.admin.users.name')"
              label-for="name"
              horizontal
              :label-cols="3"
              :feedback="feedback('name')"
            >
              <b-form-input
                id="name"
                name="name"
                required
                :placeholder="$t('labels.admin.users.placeholder.name')"
                v-model="model.name"
                :state="state('name')"
              ></b-form-input>
            </b-form-group>

            <b-form-group
              :label="$t('labels.admin.users.email')"
              label-for="email"
              horizontal
              :label-cols="3"
              :feedback="feedback('email')"
            >
              <b-form-input
                id="email"
                name="email"
                type="email"
                required
                :placeholder="$t('labels.admin.users.placeholder.email')"
                v-model="model.email"
                :state="state('email')"
              ></b-form-input>
            </b-form-group>

            <div class="form-group">
              <b-row>
                <b-col lg="9" offset-lg="3">
                  <c-switch
                    name="active"
                    v-model="model.active"
                    :description="$t('labels.admin.users.active')"
                  ></c-switch>
                </b-col>
              </b-row>
            </div>

            <b-form-group
              :label="$t('labels.admin.users.password')"
              label-for="password"
              horizontal
              :label-cols="3"
              :feedback="feedback('password')"
            >
              <b-form-input
                id="password"
                name="password"
                type="password"
                :placeholder="$t('labels.admin.users.placeholder.password')"
                v-model="model.password"
                :state="state('password')"
              ></b-form-input>
            </b-form-group>

            <b-form-group
              :label="$t('labels.admin.users.passwordConfirmation')"
              label-for="password_confirmation"
              horizontal
              :label-cols="3"
              :feedback="feedback('password_confirmation')"
            >
              <b-form-input
                id="password_confirmation"
                name="password_confirmation"
                type="password"
                :placeholder="$t('labels.admin.users.placeholder.passwordConfirmation')"
                v-model="model.password_confirmation"
                :state="state('password_confirmation')"
              ></b-form-input>
            </b-form-group>

            <b-row slot="footer">
              <b-col>
                <b-button to="/users" exact variant="secondary" size="sm">
                  {{ $t('buttons.admin.common.back') }}
                </b-button>
              </b-col>
              <b-col>
                <b-button type="submit" variant="success" size="sm" class="float-right"
                          :disabled="pending"
                          v-if="isNew || this.$app.user.can('edit users')"
                >
                  {{ isNew ? $t('buttons.admin.common.create') : $t('buttons.admin.common.edit') }}
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
  name: 'UserForm',
  mixins: [form],
  data() {
    return {
      modelName: 'admin',
      resourceRoute: 'admins',
      listPath: '/admins',
      model: {
        name: null,
        email: null,
        active: true,
        password: null,
        confirm_password: null,
      }
    }
  },
  async created() {
    this.fetchData()
  },
  methods: {
    onModelChanged() {
      if (this.model.roles) {
        this.model.roles = this.model.roles.map(item => {
          return item.id
        })
      }
    }
  }
}
</script>
