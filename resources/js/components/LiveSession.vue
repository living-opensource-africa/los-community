<template>
    <div class="container">
        <div class="col-md-12 row">
        </div>
    </div>
</template>

<script>
export default {
    name: 'liveSession',
    data () {
        return {
            showJoin: true,
            jitsi_domain: process.env.VUE_APP_DOMAIN,
            jvb_url: process.env.VUE_APP_JVB_URL,
            appName: process.env.VUE_APP_NAME || 'Living Open Source MeetApp',
            provider: process.env.VUE_APP_PROVIDER || 'Living Open Source'
        }
    },
    mounted () {
        const jitsi = document.createElement('script')
        jitsi.setAttribute('src', this.jvb_url)
        document.head.appendChild(jitsi)
    },
    methods: {
        hideShowJoinRoom () {
            if (this.showJoin) {
                this.showJoin = false
            }
            else {
                this.showJoin = true
            }
        },
        join (name, room) {
            let showJoin = this.showJoin
            this.hideShowJoinRoom()
            // Give DOM time to process
            let prom = new Promise((resolve, reject) => {
            if (this.showJoin !== showJoin) {
                resolve('success')
            }
            else {
                reject('failed')
            }
            })

            prom.then(result => {
                this.makeAPICall(name, room)
            }, err => {
                alert('Err '+err.message)
            })
        },
        makeAPICall(name, room) {
            const domain = this.jitsi_domain
            const options = {
            roomName: room,
            width: 1024,
            height: 590,
            parentNode: document.querySelector('#meet'),
            interfaceConfigOverwrite: {
                SHOW_JITSI_WATERMARK: false,
                APP_NAME: this.appName,
                NATIVE_APP_NAME: this.appName,
                PROVIDER_NAME: this.provider
                }
            }
            const vidApi = new JitsiMeetExternalAPI(domain, options)
            vidApi.executeCommand('toggleAudio', [])
            vidApi.executeCommand('toggleVideo', [])
            vidApi.executeCommand('displayName', name)
            vidApi.on('readyToClose', (evt) => {
                this.hideShowJoinRoom()
                // Possibly dipose room vidApi.dispose()
            })
        }
    }
}
</script>