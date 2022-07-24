<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
import Button from '@/Components/Button.vue';

const props = defineProps({
    website: {
        type: Object,
        required: true,
    },
});
</script>

<template>
    <Head title="Add a website" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <div class="flex items-center justify-between flex-wrap">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Showing {{ props.website.name }}
                </h2>

                <div class="flex items-center justify-end">
                    <Link
                        :href="route('dashboard')"
                        class="text-gray-600">
                        Back to dashboard
                    </Link>
                </div>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="flex gap-4 px-6 py-3 border-b">
                        <Link :href="route('website.edit', { id: props.website.id })" class="text-gray-600">
                            <Button>Edit</Button>
                        </Link>
                        <Link :href="route('website.destroy', { id: props.website.id })"
                            method="DELETE"
                            class="text-gray-600">
                            <Button>Delete</Button>
                        </Link>
                    </div>
                    <div class="p-6 bg-white border-b border-gray-200">
                        <p>Name: {{ props.website.name }}</p>
                        <p>Url: {{ props.website.url }}</p>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>
