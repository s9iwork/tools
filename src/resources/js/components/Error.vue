<template>
  <div class="row">
    <div class="col s12">
      <div class="errorMessageContainer">
        <ul class="">
          <li class="errorMessage" v-for="(error, i) in errors" :key="i">
            {{ error }}
          </li>
        </ul>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'Error',
  props: {
    errors: {
      type: Array,
      required: true,
    },
  },
};
</script>

<style scoped>
.errorMessageContainer {
  display: flex;
  flex-direction: column;
  align-items: center;
}

.errorMessage {
  list-style: initial;
  color: #ff0000
}
</style>
