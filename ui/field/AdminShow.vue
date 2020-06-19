<template>
  <div>
    <template v-for="val in value">
      <span class="block mb-2">
        {{ val }}
      </span>
    </template>
  </div>
</template>

<script>
export default {
  props: [
    'value',
    'field',
    'model',
    'module',
    'action'
  ]
}
</script>
