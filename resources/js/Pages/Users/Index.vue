<template>
    <Head>
        <title>Users</title>
        <meta type="description" content="Inertia demo app users page" head-key="description">
    </Head>

    <div class="flex justify-between mb-6">
        <div class="flex items-center">
            <h1 class="text-3xl">
                Users
            </h1>

            <Link v-if="can.createUser" href="/users/create" class="text-gray-600 text-sm ml-3">New User</Link>
        </div>

        <input v-model="search" type="text" placeholder="Search..." class="border px-2 rounded-lg">
    </div>

    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <tbody class="bg-white divide-y divide-gray-200">
                        <tr v-for="user in users.data" :key="user.id">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div>
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ user.name }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td v-if="user.can.edit" class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a :href="`/users/${user.id}/edit`" class="text-gray-600 hover:text-gray-900">Edit</a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <Pagination :links="users.links" class="mt-6"/>
</template>

<script setup>
import debounce from "lodash/debounce"
import Pagination from "../../Shared/Pagination";
import {ref, watch} from 'vue';
import {router} from "@inertiajs/vue3";

let props = defineProps({
    users: Object,
    filters: Object,
    can: Object
});

let search = ref(props.filters.search);

watch(search, debounce(($value) => {
        router.get('/users', {search: $value}, {
            preserveState: true,
            replace: true
        })
    }, 500)
);
</script>
