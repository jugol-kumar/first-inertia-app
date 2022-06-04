<template>

    <Link
        class="text-black hover:underline hover:text-black-300"
        :class="{'underline font-bold text-blue-800' : active}">
        <slot/>
    </Link>
</template>

<script>
export default {
    name: "NavLink",
    props:{
        active: Boolean,
    }


}
</script>

<style scoped>


</style>
