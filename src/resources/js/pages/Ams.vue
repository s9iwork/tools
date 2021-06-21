<template>
  <div class="pageContainer">
    <Header :tool-name="'資産運用シミュレーター'" :tool-path="'/ams'" :is-top-page="false"/>
    <main class="container content">
      <!-- // TODO description-->
      <ToolDescription description="資産運用シミュレーターのディスクリプション"/>
    </main>
    <Footer/>
  </div>
</template>

<script>
import ToolDescription from '../components/ToolDescription';
import Header from '../components/Header';
import Footer from '../components/Footer';

export default {
  name: 'Ams',
  components: { ToolDescription, Header, Footer },
};
</script>
