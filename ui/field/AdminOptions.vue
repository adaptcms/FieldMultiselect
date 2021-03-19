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
      :class="{ 'border-red-500': hasError, 'border-gray-300': !hasError }"
      v-model="options"
    />

    <template v-if="errorsList.length">
      <span v-for="error in errorsList" :key="error" class="border-red-700 block px-2 py-2 text-sm text-red-100 bg-red-500">
        {{ error }}
      </span>
    </template>
  </div>
</template>

<script>
import { get } from 'lodash'

export default {
  props: [
    'modelValue',
    'field',
    'package',
    'errors',
    'fields'
  ],

  emits: [
    'update:modelValue'
  ],

  watch: {
    modelValue (newVal, oldVal) {
      if ((newVal !== oldVal) && get(newVal, 'options', null)) {
        this.options = newVal.options
      }
    },

    options (newVal, oldVal) {
      if (newVal !== oldVal) {
        this.$emit('update:modelValue', { options: newVal })
      }
    }
  },

  computed: {
    hasError () {
      let key = 'meta.options'

      return (typeof this.errors[key] !== 'undefined')
    },

    errorsList () {
      let key = 'meta.options'

      return (typeof this.errors[key] !== 'undefined' ? this.errors[key].messages : [])
    }
  },

  data () {
    return {
      options: null
    }
  },

  mounted () {
    if (get(this.modelValue, 'options', null)) {
      this.options = this.modelValue.options
    }
  }
}
</script>
