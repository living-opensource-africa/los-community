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
                <form v-bind:action="shareUrl" method="GET">

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

                <p>
                    Share this link with participants: <br /> <a v-bind:href="shareUrl">{{ shareUrl }}</a> 
                </p>
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
            token: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            shareUrl: ''
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
                    this.shareUrl = document.location.protocol+'//'+document.location.host+'/room/'+this.training.id+'/'+btoa(this.training.title)
                    axios.get('/api/trainer/'+this.training.user_id)
                        .then(response => {
                        this.trainer = response.data
                    })
            })
        },
        copyText () {
            const copyText = document.getElementById("url");

              /* Select the text field */
            copyText.select();
            copyText.setSelectionRange(0, 99999); /*For mobile devices*/

            /* Copy the text inside the text field */
            document.execCommand("copy");

        },
        setShareUrl () {
            const id = this.training.title
            this.shareUrl = document.location.protocol+'//'+document.location.host+'/room/'+id+'/'+btoa(this.training.title)
        }
    },
    created () {
        this.getTraining(),
        this.getUser()
    }
}
</script>
