<template>
  <div class="flex-col">
    <label for="form-options" class="text-lg font-normal text-gray-700 w-auto">
      Options
      <span class="text-xs">Separate with comma (ex. option one,option two, etc.)</span>
    </label>

    <input
      type="text"
      id="form-options"
      class="text-base py-3 px-3 shadow-sm block mt-1 border w-full"
      v-model="options"
    />
  </div>
</template>

<script>
import get from 'lodash.get'

export default {
  props: [
    'value',
    'field',
    'module',
    'errors'
  ],

  watch: {
    value (newVal, oldVal) {
      if ((newVal !== oldVal) && get(newVal, 'options', null)) {
        this.options = newVal.options
      }
    },

    options (newVal, oldVal) {
      if (newVal !== oldVal) {
        this.$emit('input', { options: newVal })
      }
    }
  },

  data () {
    return {
      options: null
    }
  },

  mounted () {
    if (!this.options && get(this.value, 'options', null)) {
      this.options = this.value.options
    }
  }
}
</script>
