<template>
    <div class="container">
      <div class="col-md-12 row">
		<div class="col-md-8" v-if="auth.user_type == 1">
		   <h3> Edit Meet Up </h3>
		    <div class="form-group">
               	<div class="form-row">
               		<div class="col-md-6">
               			<label for="name"> Title </label>
               		</div>
               		<div class="col-md-6">
               			<input class="form-control" type="text" v-model="title"
               				placeholder="Linux Container Class" required />
               		</div>
               	</div>
            </div>
			<div class="form-group">
               	<div class="form-row">
               		<div class="col-md-6">
               			<label for="name"> Date </label>
               		</div>
               		<div class="col-md-6">
               			<input class="form-control" type="date" v-model="date"
						   required />
               		</div>
               	</div>
            </div>
			<div class="form-group">
               	<div class="form-row">
               		<div class="col-md-6">
               			<label for="name"> Time </label>
               		</div>
               		<div class="col-md-6">
               			<input class="form-control" type="time" v-model="time"
						   required />
               		</div>
               	</div>
            </div>
			<div class="form-group">
               	<div class="form-row">
               		<div class="col-md-6">
               			<label for="name"> Description </label>
               		</div>
               		<div class="col-md-6">
               			<textarea class="form-control"
               				placeholder="Linux Container Class" v-model="description">
						</textarea>
						<errors-component
							:message="msg"
							alertName="errors"
							:trigger="trigger"/>
						<success-component
							:message="msg"
							alertName="success"
							:trigger="toggle"/>
               		</div>
               	</div>
            </div>
			<div class="form-group">
               	<div class="form-row">
               		<div class="col-md-6">
               			<label for="name">  </label>
               		</div>
               		<div class="col-md-6">
               			<input class="form-control btn btn-primary" type="submit"
               				placeholder="Save this meet up"
							   value="UPDATE" v-on:click="notEmpty()" />
               		</div>
               	</div>
            </div>
       </div>
	   <div class="col-md-4">
		   <h3> Modify Meet Ups </h3>
		   <br />
		   <ol>
			   <li v-bind:key="meet.id" v-for="meet in meetup">
				    <div class="row">
              <div class="col-md-6">
                <a
    						  v-bind:href="host+'/home/trainings/'+meet.id+'/edit'"
    						  v-bind:title="meet.description">
    						  {{ meet.title }}
    					 </a>
              </div>
              <div class="col-md-6">
                <a
      					  v-if="auth.id == meet.user_id"
      					  @click="deleteMeetUp(meet.id)"
      					  v-bind:title="'delete '+meet.title">
      					   <font-awesome-icon icon="trash" />
                </a>
              </div>
            </div>
				</li>
		   </ol>
	   </div>
      </div>
    </div>
</template>

<script>
import successComponent from '../elements/success'
import errorsComponent from '../elements/errors'
export default {
	components: {
		successComponent,
		errorsComponent
	},
	data () {
		return {
			meetup: [],
			title: '',
			date: '',
			time: '',
			description: '',
			msg: '',
			trigger: '',
			toggle: '',
			auth: '',
      training: '',
      host: window.location.origin
		}
	},
	methods: {
		save () {
			axios.put('/api/training/'+this.$route.params.id+'/update', {
				title: this.title,
				date: this.date,
				time: this.time,
				description: this.description
			})
			.then(response => {
				this.toggle = "success"
				this.msg = response.data.message
				// Reload the trainings tab
				this.loadTrainings()
			})
			.catch(err => {
				this.trigger = "errors"
				this.msg = err.data.message
			})
		},
		notEmpty () {
			if (this.title !== '' &&
				this.date !== '' &&
				this.time !== '') {
					this.save()
				}
				else {
					let arr = []
					if (this.title == '') {
						arr.push('title')
					}
					if (this.date == '') {
						arr.push('date')
					}
					if (this.time == '') {
						arr.push('time')
					}

					this.msg = "Please fill in "+arr.reduce((fields, item) => {
						return fields +", "+item
					})
					this.trigger = "errors"
				}
		},
		loadTrainings() {
			axios.get('/api/meetups')
				.then(response => {
					this.meetup = response.data
		})
		},
    getTraining() {
        axios.all([
          axios.get('/api/training/'+this.$route.params.id),
          axios.get('/api/user')
        ])
        .then(axios.spread((training, trainer) => {
          this.auth = trainer.data
          if (training.data.user_id == trainer.data.id) {
            let timeStamp = training.data.date_time
            this.time = timeStamp.split(' ')[1]
            this.date = timeStamp.split(' ')[0]
            this.title = training.data.title
            this.description = training.data.description
          }
        }))
    },
    deleteMeetUp (id) {
      alert('Unable to delete')
    }
	},
	created () {
    this.getTraining()
		this.loadTrainings()
	}
}
</script>
