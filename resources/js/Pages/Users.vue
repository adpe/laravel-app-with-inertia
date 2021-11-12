<template>
    <Head>
        <title>Users</title>
        <meta type="description" content="Inertia demo app users page" head-key="description">
    </Head>

    <h1 class="text-3xl">
        Users
    </h1>

    <div style="margin-top: 800px">
        <p>The current time is {{ time }}.</p>

        <Link href="/users" class="text-red-500" preserve-scroll>
            Refresh
        </Link>
    </div>
</template>

<script>
export default {
    props: { time: String }
};
</script>
