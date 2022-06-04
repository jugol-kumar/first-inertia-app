<template>

    <Head title="Layout"/>

    <header class="flex p-6 bg-slate-300 justify-between">
        <div class="flex  items-end">
            <h1 class="font-bold text-slate-600 text-2xl">My App</h1>
            <p class="text-sm ml-6">Welcome {{ username }} !</p>
        </div>
        <Nav></Nav>
    </header>

    <section class="p-6 max-w-4xl m-auto bg-slate-100">
        <slot/>
    </section>
</template>

<script>
import Nav from "./Nav";
export default {
    name: "Layout",
    components: {Nav},
    computed:{
        username(){
            return this.$page.props.auth.user.username;
        }
    }
}
</script>

<style scoped>

</style>
