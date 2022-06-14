<template>
    <h1 class="mb-6 text-4xl">
        Create User Form
    </h1>

    <form @submit.prevent="submit" method="post" action="#">
        <div class="mb-6">
            <label class="mb-2">
                Name
            </label>
            <input type="text" v-model="form.name" class="w-full py-2 px-3 rounded border">
            <span class="mt-1 text-red-500 font-xs" v-if="errors.name" v-text="errors.name"></span>
        </div>
        <div class="mb-6">
            <label class="mb-2">
                Email
            </label>
            <input type="email" v-model="form.email" class="w-full py-2 px-3 rounded border">
            <span class="mt-1 text-red-500 font-xs" v-if="errors.email" v-text="errors.email"></span>

        </div>
        <div class="mb-6">
            <label class="mb-2">
                Password
            </label>
            <input type="password" v-model="form.password" class="w-full py-2 px-3 rounded border">
            <span class="mt-1 text-red-500 font-xs" v-if="errors.password" v-text="errors.password"></span>

        </div>


        <button class="px-5 py-2 bg-slate-300" :disabled="processing">Save</button>
    </form>

</template>

<script setup>

import {Inertia} from "@inertiajs/inertia";
import {ref} from "vue";

    let form = {
        name: "",
        email: "",
        password:""
    }
    defineProps({
        errors:Object,
    })
    let processing = ref(false);

let submit = () =>{
        Inertia.post('/users', form, {
            onStart: () => {processing.value = true},
            onFinish: () => {processing.value = false}
        });
    }

</script>

<style scoped>

</style>
