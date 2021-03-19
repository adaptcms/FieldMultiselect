<template>
  <div>
    <Multiselect
      v-if="field.meta && field.meta.options"
      :id="`form-${field.column_name}`"
      :fieldName="field.column_name"
      :options="options"
      v-model="selected"
    />

    <template v-if="errors[field.column_name].is">
      <span v-for="error in errors[field.column_name].messages" :key="error" class="border-red-700 block px-2 py-2 text-sm text-red-100 bg-red-500">
        {{ error }}
      </span>
    </template>
  </div>
</template>

<script>
import { get, isEmpty } from 'lodash'
import Multiselect from '@/Adaptcms/Base/ui/components/Form/Multiselect'

export default {
  props: [
    'modelValue',
    'field',
    'errors',
    'formMeta',
    'model',
    'action'
  ],

  emits: [
    'update:modelValue'
  ],

  components: {
    Multiselect
  },

  watch: {
    modelValue (newVal, oldVal) {
      if (!isEmpty(newVal) && newVal !== oldVal) {
        this.selected = newVal
      }
    },

    selected (newVal, oldVal) {
      if (newVal !== oldVal) {
        this.$emit('update:modelValue', newVal)
      }
    }
  },

  computed: {
    options () {
      let options = get(this.field, 'meta.options', null)

      if (options) {
        options = options.split(',')
      }

      return options
    }
  },

  data () {
    return {
      selected: null
    }
  },

  mounted () {
    if (!this.selected) {
      this.selected = this.modelValue
    }
  }
}
</script>
