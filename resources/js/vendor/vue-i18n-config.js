/**
 * Initialize Vue
 */
import Vue from 'vue'

/**
 * Locales
 */
import VueI18n from 'vue-i18n'
import Locales from './vue-i18n-locales.generated.js'

Vue.use(VueI18n)

Vue.config.lang = 'be';

export function createLocales(locale) {
  return new VueI18n({
    locale: locale,
    messages: Locales
  })
}
