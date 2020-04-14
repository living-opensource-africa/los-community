<template>
    <div class="container">
        <div class="col-md-12 row">
            <div class="col-md-12">
                <h3> {{ training.title }} </h3> by {{ trainer.name }}
                <br />
                Scheduled for {{ training.date_time }} CAT
                <br />
                <p> {{ training.description }} </p>
                <br />
                <form action="/room" method="POST">

                    <input
                    name="room_id"
                    type="hidden"
                    v-bind:value="training.id" />

                    <input
                    type="hidden"
                    name="_token"
                    v-bind:value="token" />

                    <button class="btn btn-primary">JOIN</button>

                </form>
            </div>
        </div>
    </div>
</template>

<script>
import successComponent from '../elements/success'
import errorsComponent from '../elements/errors'
import liveSession from './LiveSession'
export default {
    components: {
        successComponent,
        errorsComponent,
        liveSession
    },
    data () {
        return {
            meetup: [],
            auth: '',
            training: '',
            trainer: '',
            token: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    },
    methods: {
        loadTrainings() {
			axios.get('/api/meetups')
				.then(response => {
					this.meetup = response.data
		    })
		},
		getUser() {
			axios.get('/api/user')
				.then(response => {
					this.auth = response.data
			})
        },
        getTraining() {
            axios.get('/api/training/'+this.$route.params.id)
                .then(response => {
                    this.training = response.data
                    axios.get('/api/trainer/'+this.training.user_id)
                        .then(response => {
                        this.trainer = response.data
                    })
            })
        }
    },
    created () {
        this.getTraining(),
        this.getUser()
    }
}
</script>
