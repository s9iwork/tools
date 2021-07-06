<template>
  <PageContainer>
    <Header slot="header" :tool-name="'カラムモデルコンバーター'" :tool-path="'/cmc'" :is-top-page="false"/>
    <main slot="main" class="container content">
      <!-- TODO -->
      <ToolDescription description="カラムモデルコンバーター"/>
    </main>
    <Footer slot="footer"/>
  </PageContainer>
</template>

<script>
import M from 'materialize-css';
import PageContainer from '../components/PageContainer';
import ToolDescription from '../components/ToolDescription';
import Header from '../components/Header';
import Footer from '../components/Footer';

export default {
  name: 'Cmc',
  components: {
    Header,
    PageContainer,
    ToolDescription,
    Footer,
  },
  mounted() {
    const elems = document.querySelectorAll('select');
    M.FormSelect.init(elems, {});
  },
};
</script>

<style scoped>
.content {
  flex: 1 0 auto
}
</style>
