<template>
    <div class="row col-md-12">
        <div class="col-md-6">
            <h3>All Users</h3>
        </div>
        <div class="col-md-6 card-right">
            <h3>Add New User</h3>
              
                <div class="form-group">
               		<div class="form-row">
               			<div class="col-md-6">
               				<label for="name"> Full Name </label>
               			</div>
               			<div class="col-md-6">
               				<input class="form-control" type="text"
               					placeholder="Ms. Some Body"/>
               			</div>
               		</div>
                </div>
                <div class="form-group">
               		<div class="form-row">
               			<div class="col-md-6">
               				<label for="email"> Email </label>
               			</div>
               			<div class="col-md-6">
               				<input class="form-control" type="email"
               					placeholder="someone@example.com"/>
               			</div>
               		</div>
                </div>
                <div class="form-group">
               		<div class="form-row">
               			<div class="col-md-6">
               				<label for="email"> User Type </label>
               			</div>
               			<div class="col-md-6">
                            <div class="custom-select" style="width:200px;">
               				<select>
                                <option v-for="type in userTypes" v-bind:key="type.id">
                                       {{ type.name }}
                                </option>
               				</select>
                            </div>
               			</div>
               		</div>
                </div>
                <div class="form-group">
                	<div class="form-row">
                		<input type="button" value="SAVE"
                			class="btn btn-primary">
                	</div>
                </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'AddUser',
    data () {
        return {
            userTypes: '',
            name: '',
            email: ''
        }
    },
    mounted () {

        axios.get('/api/user_types')
            .then( response => {
                this.userTypes = response.data
        })

        const selectCss = document.createElement('style')
        selectCss.setAttribute('src', '/css/select.css')
        document.head.appendChild(selectCss)
    },
    methods: {
        // methods go here
    }
}
</script>

<style scoped>
.card-right {
	border-left: 1px solid  #f0883f;
}
</style>