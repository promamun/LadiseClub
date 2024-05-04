<script>
export default {
    name: 'SpinningOverLay',
    props: {
        spinner : Boolean
    },
}
</script>

<template>
    <div v-if="spinner" class="col-sm-12">
        <div  class="overlay">
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>
</template>

<style scoped>
.overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(255, 255, 255, 0.7); /* semi-transparent white background */
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 1000; /* ensure it's above other elements */
}

.overlay .spinner-border {
    width: 3rem;
    height: 3rem;
}
</style>
