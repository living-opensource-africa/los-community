<template>
  <div class="row col-md-12">
      <div class="col-md-12">
          <p> Hi, {{ auth.name }}, sharpen your skills with online playgounds</p>
          <div class="row">
            
          </div>
          <div class="row">
            <div class="col-md-6">
              <h3> Developer Playgrounds </h3>
                <ul>
                  <li> <a href="https://flutterstudio.app" target="_blank">Flutter Studio</a></li>
                  <li> <a href="https://code.sololearn.com" target="_blank">Solo Learn</a> </li>
                </ul>
            </div>
            <div class="col-md-6">
              <h3> SysAdmin Playgrounds </h3>
                <ul>
                  <li> <a href="https://katacoder.com" target="_blank">Katocoda</a> </li>
                </ul>
            </div>
          </div>
            <div class="row">
            <div class="col-md-6">
              <h3> Database Admin Playgrounds </h3>
                <ul>
                  <li> Coming Soon </li>
                </ul>
            </div>
            <div class="col-md-6">
              <h3> CyberSecurity Playgrounds </h3>
                <ul>
                  <li> <a href="https://tryhackme.com" target="_blank">Try Hack Me</a> </li>
                  <li> <a href="https://hackthebox.eu" target="_blank">Hack The Box</a> </li>
                </ul>
            </div>
          </div>
      </div>
  </div>
</template>

<script>
export default {
  data () {
    return {
      auth: ''
    }
  },
  mounted () {
    this.getUser()
  },
  methods: {
    getUser() {
      axios.get('/api/user')
        .then(response => {
          this.auth = response.data
        })
    }
  }
}
</script>
