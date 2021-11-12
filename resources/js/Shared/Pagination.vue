<template>
    <div>
        <Component
            :is="link.url ? 'Link' : 'span'"
            v-for="link in links"
            v-html="link.label"
            :href="link.url"
            class="px-1"
            :class="{ 'text-gray-400' : !link.url, 'font-bold' : link.active }"
        />
    </div>
</template>

<script setup>
defineProps({ links: Array });
</script>
