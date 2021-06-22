<template>
  <div class="pageContainer">
    <slot name="header"/>
    <slot name="main"/>
    <slot name="footer"/>
  </div>
</template>

<script>
export default {
  name: 'PageContainer',
};
</script>

<style scoped>
.pageContainer {
  display: flex;
  flex-direction: column;
  height: 100vh;
}
</style>
