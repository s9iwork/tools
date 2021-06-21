<template>
  <div class="row">
    <div class="col s12">
      <h2 class="aboutSubject">
        このツールについて
      </h2>
      <div>
        {{ description }}
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'ToolDescription',
  props: {
    description: {
      type: String,
      required: true,
    },
  },
};
</script>

<style scoped>
.aboutSubject {
  font-size: 1.5rem;
  border-left: solid 5px #ee6e73;
  padding-left: 5px;
  color: #ee6e73;
}
</style>
