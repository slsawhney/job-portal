<template>
    <div class="c-container">
        <h1 v-text="message" />
    </div>
</template>

<script>
    export default {
        name: 'Main',
        data() {
            return {
                message: "Code challenge!"
            };
        }
    };
</script>

<style scoped>
    h1 {
        font-weight: bold;
        font-size: 3rem;
        text-align: center;
        margin-top: 2rem;
    }
</style>
