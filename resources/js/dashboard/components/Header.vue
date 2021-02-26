<template>
  <Header fixed>
    <SidebarToggler class="d-lg-none" display="md" mobile></SidebarToggler>

    <a class="navbar-brand" :href="$app.homePath" target="_blank">
      <img
        class="navbar-brand-full"
        :src="require('@/dashboard/logo')"
        height="30"
        alt="Dbai-logo"
      >
      <img
        class="navbar-brand-minimized"
        :src="require('@/dashboard/Dbai-logo')"
        width="30"
        height="30"
        alt="Dbai-logo"
      >
    </a>

    <SidebarToggler class="d-md-down-none" display="lg"></SidebarToggler>
    <b-navbar-nav class="ml-auto">
      <HeaderDropdown right class="px-3 d-none d-md-block">
        <template slot="header">
          <span class="d-md-down-none">
            <i class="fe fe-plus-circle"></i>&nbsp;&nbsp;{{
              $t('labels.admin.newMenu.header')
            }}
          </span>
        </template>
        <template slot="dropdown">
          <b-dropdown-item to="/campaigns/create">
            <i class="fe fe-book"></i>&nbsp;&nbsp;{{
              $t('labels.admin.newMenu.campaign')
            }}
</b-dropdown-item><!--
          <b-dropdown-item to="/users/create">
            <i class="fe fe-users"></i>&nbsp;&nbsp;{{ $t('labels.admin.newMenu.user') }}
          </b-dropdown-item>-->
        </template>
      </HeaderDropdown>
      <!--
      <HeaderDropdown right class="px-3 d-none d-md-block">
        <template slot="header">
          <span class="d-md-down-none">{{ $t('labels.admin.languageMenu.header') }}</span>
        </template>
        <template slot="dropdown">
          <b-dropdown-item :key="index" v-for="(locale, index) in this.$app.locales"
                           :hreflang="index"
                           :href="`/doika/${index}/${$app.adminPathName}${$route.fullPath}`"
          >
            {{ locale.native }}
          </b-dropdown-item>
        </template>
      </HeaderDropdown>
      -->
      <HeaderDropdown right class="px-3">
        <template slot="header">
          <span class="d-md-down-none">
            {{ this.$app.user.name }}
          </span>
        </template>
        <template slot="dropdown">
          <b-dropdown-item @click="logout">
            <i class="fe fe-log-out"></i>&nbsp;&nbsp;{{
              $t('labels.admin.accountMenu.logout')
            }}
          </b-dropdown-item>
        </template>
      </HeaderDropdown>
    </b-navbar-nav>
  </Header>
</template>

<script>
import axios from 'axios';

export default {
  name: 'AppHeader',
  methods: {
    logout() {
      axios
        .post(this.$app.route('logout'))
        .then(response => {
          this.$router.push(this.$app.route('login'));
        })
        .catch(error => {
          location.reload();
        });
    }
  }
};
</script>
