<template>
    <div class="alert alert-danger alert-dismissible" v-if="alertName == trigger">
        {{ message }}
    </div>
</template>

<script>
export default {
    name: 'errorsComponent',
    props: {
        message: {
            type: String,
            required: true
        },
        alertName: {
            type: String,
            required: true
        },
        trigger: {
            type: String,
            required: false,
            default: ''
        }
    }
}
</script>