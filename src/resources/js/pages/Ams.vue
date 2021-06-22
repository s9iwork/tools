<template>
  <PageContainer>
    <Header slot="header" :tool-name="'資産運用シミュレーター'" :tool-path="'/ams'" :is-top-page="false"/>
    <main slot="main" class="container content">
      <!-- // TODO description-->
      <ToolDescription description="資産運用シミュレーターのディスクリプション"/>
    </main>
    <Footer slot="footer"/>
  </PageContainer>
</template>

<script>
import ToolDescription from '../components/ToolDescription';
import Header from '../components/Header';
import Footer from '../components/Footer';
import PageContainer from '../components/PageContainer';

export default {
  name: 'Ams',
  components: {
    PageContainer, ToolDescription, Header, Footer,
  },
};
</script>

<style scoped>
.content {
  flex: 1 0 auto;
}
</style>
