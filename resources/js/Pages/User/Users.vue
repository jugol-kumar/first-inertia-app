<template>
    <Head title="Users"/>
    <div class="flex justify-between mb-6">
        <h1 class="text-4xl">
            All User
        </h1>
        <Link href="/users/create" class="px-5 py-2 rounded-full text-blue-500 bg-slate-300">Create User</Link>


        <input type="text" v-model="search" placeholder="Search anything..." class="border px-2">

    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-10">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    User name
                </th>

                <th scope="col" class="px-6 py-3 text-right">
                    Action
                </th>
            </tr>
            </thead>
            <tbody>
                <tr
                    v-for="user in users.data"
                    :key="user.id"
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                        {{ user.name}}
                    </th>
                    <td class="px-6 py-4 text-right">
                        <Link
                            :href="`/user/${user.id}/edit`"
                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</Link>
                    </td>
                </tr>
            </tbody>

        </table>
        <div class="my-6">
            <Pagination :links="users.links"/>
        </div>



    </div>



</template>
<script setup>
import Pagination from "../../Shared/Pagination";
import {ref, watch} from "vue";
// import {watch} from "@vue/runtime-core";
import {Inertia} from "@inertiajs/inertia";
// import
    defineProps({
        users:Object,
        filters:Object,
    });

    let search = ref("");
    watch(search, value => {
       Inertia.get('/users', {search:value}, {
           preserveState: true
       });
    });

</script>

