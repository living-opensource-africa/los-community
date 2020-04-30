<template>
    <div class="container">
        <div class="row col-md-12">
            <iframe class="col-md-12 terminal" v-bind:src="terminal_url">
            </iframe>
        </div>
    </div>
</template>

<script>
export default {
    data () {
        return {
            terminal_url: process.env.MIX_TERMINAL_URL
        }
    }
}
</script>

<style scoped>
 .terminal {
     height: 450px;
 }
</style>