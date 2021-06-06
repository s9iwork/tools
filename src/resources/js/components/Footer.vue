<template>
  <footer id="footer" class="footer">
    <div class="container footerContainer">
      <div class="footerInner">
        <div class="copyright">&copy; {{ new Date().getFullYear() }}
          <a href="https://shinjiezumi.work" class="copyrightLink" target="_blank">shinjiezumi</a>
        </div>
        <div>
          <ul class="snsList">
            <li>
              <a href="https://github.com/shinjiezumi/tools" target="_blank">
                <i class="fab fa-github snsIcon"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
</template>

<script>
export default {
  name: 'Footer',
};
</script>

<style scoped>
.footer {
  background-color: #ee6e73;
  width: 100%;
  position: absolute;
  bottom: 0;
}

.footerContainer {
  display: flex;
  justify-content: center;
}

.footerInner {
  display: flex;
  align-items: center;
}

.copyright {
  font-size: 1.2rem;
  margin-right: .5rem;
  height: 3rem;
  color: #ffffff;
}

.copyrightLink {
  color: #ffffff;
}

.snsList {
  display: flex;
  height: 3rem;
}

.snsIcon {
  color: #ffffff;
  font-size: 1.5rem;
  margin-right: .5rem;
}
</style>
