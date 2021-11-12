<template>
    <nav class="mt-6">
        <ul class="list-disc">
            <li>
                <Link href="/" class="text-red-500 hover:underline">Home</Link>
            </li>
            <li>
                <Link href="/users" class="text-red-500 hover:underline">Users</Link>
            </li>
            <li>
                <Link href="/settings" class="text-red-500 hover:underline">Settings</Link>
            </li>
            <li>
                <Link href="/logout" method="post" as="button" class="text-red-500 hover:underline">Logout</Link>
            </li>
        </ul>
    </nav>
</template>

<script>
import {Link} from '@inertiajs/inertia-vue3';

export default {
    components: {Link},
};
</script>
