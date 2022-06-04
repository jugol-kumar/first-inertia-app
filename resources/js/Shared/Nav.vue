<template>
    <div>
        <ul class="flex space-x-3 link-disc">
            <li>
                <NavLink href="/" :active="$page.component === 'Home'">
                    Home
                </NavLink>
            </li>
            <li>
                <NavLink href="/users" :active="$page.component === 'Users'">
                    User
                </NavLink>
            </li>
            <li>
                <NavLink href="/settings" :active="$page.component === 'Settings'">
                    Settings
                </NavLink>
            </li>
        </ul>
    </div>
</template>

<script>
import NavLink from "./NavLink";
export default {
    name: "Nav",
    components: {
        NavLink,
    }
}
</script>

<style scoped>

</style>
