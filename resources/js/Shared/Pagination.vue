<template>

    <Component
        :is="link.url ? 'Link' : 'span'"
        v-for="link in links"
        :href="link.url"
        class="px-3"
        :class="[link.url ? '' : 'text-gray-400', link.active ? 'font-bold' : '']"
        v-html="link.label"/>
</template>

<script>
export default {
    name: "Pagination",
    props: {
        links:Array,
    }
}
</script>

<style scoped>

</style>
