<template>
    <div class="row col-md-12">
        <div class="col-md-6">
            <h3> Hi, {{ auth.name }}</h3>
            
        </div>
        <div class="col-md-6 card-right" v-if="auth.user_type == 1">
            <h3>All Users</h3>
               <ol>
                 <li v-bind:key="user.id" v-for="user in users"> 
                   <div class="row">
                     <div class="col-md-6">
                       {{ user.name }}
                     </div>
                     <div class="col-md-6">
                       <input type="checkbox" v-if="user.user_type == 1"
                        checked />
                       <input type="checkbox" v-else />
                     </div>
                   </div>
                 </li>
               </ol>
               <input class="btn btn-warning" type="button" value="SAVE" />
        </div>
        <div class="col-md-6 card-right" v-else>
          <h3> Community Members </h3>
          <ol>
            <li v-bind:key="user.id" v-for="user in users">
              {{ user.name }}
            </li>
          </ol>
        </div>
    </div>
</template>

<script>
export default {
    name: 'AllUsers',
    data () {
        return {
            userTypes: '',
            name: '',
            email: '',
            auth: '',
            users: [],
            perms: []
        }
    },
    mounted () {

        axios.get('/api/user_types')
            .then( response => {
                this.userTypes = response.data
        })

        this.getUser()
        this.getAllUsers()

        const selectCss = document.createElement('style')
        selectCss.setAttribute('src', '/css/select.css')
        document.head.appendChild(selectCss)
    },
    methods: {
      getUser() {
        axios.get('/api/user')
          .then(response => {
            this.auth = response.data
          })
      },
      getAllUsers () {
        axios.get('/api/all_users')
          .then(response => {
            this.users = response.data
      })
    }
    }
}
</script>

<style scoped>
.card-right {
	border-left: 1px solid  #f0883f;
}
</style>
