<template>
    <Head>
        <title>Users</title>
        <meta type="description" content="Inertia demo app users page" head-key="description">
    </Head>

    <h1 class="text-3xl">
        Users
    </h1>

    <ul>
        <li
            v-for="user in users"
            v-text="user.name"
            :key="user.id"
        >
        </li>
    </ul>
</template>

<script setup>
defineProps({ users: Array});
</script>
