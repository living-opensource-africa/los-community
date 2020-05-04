<template>
  <div class="row col-md-12">
      <div class="col-md-6">
          <h3> Hi, {{ auth.name }}</h3>
          <div class="col-md-6">
            Welcome home!
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
