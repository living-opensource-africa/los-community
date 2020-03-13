<template>
    <div class="container">
        <div class="row col-md-12">
            <div class="col-md-4">
                {{ menu }}
                <br />
                <a href="">Users</a>
                <br />
                <a href="">New User</a>
                <br />
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        menu:{
            type: String,
            required: true
        }
    }
}
</script>