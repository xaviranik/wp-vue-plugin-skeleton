<template>
  <div class="wp-skeleton">
    <h1>Hey, {{ message }}</h1>
  </div>
</template>

<script>
export default {
    name: 'App',
    data () {
        return {
            message: 'Hello from the AppComponent'
        };
    }
};
</script>

<style lang="scss">
h1 {
	color: purple;
}
</style>
