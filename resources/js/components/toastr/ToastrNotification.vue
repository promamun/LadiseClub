<template>

</template>

<script setup>
import { onMounted, toRefs } from 'vue';
import toastr from 'toastr';
import 'toastr/build/toastr.min.css';

// Define props
const props = defineProps({
  success: {
    type: String,
    default: null,
  },
  error: {
    type: String,
    default: null
  },
  warning: {
    type: String,
    default: null
  },
  info: {
    type: String,
    default: null
  }
});

// Destructure props
const { success, error, warning, info } = toRefs(props);

onMounted(() => {
  if (success.value) {
    toastr.success(success.value);
  } else if (error.value) {
    toastr.error(error.value);
  } else if (warning.value) {
    toastr.warning(warning.value);
  } else if (info.value) {
    toastr.info(info.value);
  }
});
</script>
<style>
.toast-success {
  background-color: green !important;
}

.toast-error {
  background-color: red !important;
}

.toast-warning {
  background-color: orange !important;
}

.toast-info {
  background-color: blue !important;
}
</style>
