<template>
    <div class="alert alert-success" v-if="alertName == trigger">
        {{ message }}
    </div>
</template>

<script>
export default {
    name: 'successComponent',
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