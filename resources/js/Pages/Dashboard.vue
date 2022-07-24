<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
import Button from '@/Components/Button.vue';

const props = defineProps({
    websites: {
        type: Array,
        required: true,
    }
});

const getStatusColor = (status) => {
    switch (true) {
        case status >= 100 && status < 200:
            return 'text-blue-500';
        case status >= 200 && status < 300:
            return 'text-green-500';
        case status >= 300 && status < 400:
            return 'text-yellow-500';
        case status >= 400 && status < 500:
            return 'text-red-500';
        default:
            return 'text-black-500';
    }
};
</script>

<template>
    <Head title="Dashboard" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="mb-8">
                            <Link :href="route('website.create')">
                                <Button class="float-right">
                                    Add a website
                                </Button>
                            </Link>
                            <div v-if="props.websites.length == 0">There are no monitored websites.</div>
                            <div v-else>Showing {{ websites.length }} monitored  {{ websites.length == 1 ? 'site' : 'sites'}}.</div>
                        </div>
                        
                        <div v-for="website in props.websites" :key="website.id">
                            <div class="flex flex-wrap items-center justify-between gap-4 w-full border-b p-2">
                                <h3 class="text-lg leading-6 font-medium text-gray-900">
                                    {{ website.name }}
                                </h3>
                                <p class="text-base leading-6 text-gray-500">
                                    {{ website.url }}
                                </p>
                                <p class="font-bold" :class="getStatusColor(website.latest_status.status)">
                                    {{ website.latest_status.status}}
                                </p>
                                <p>
                                    {{ website.latest_status.error }}
                                </p>
                                <p class="text-sm">
                                    {{ new Date(website.latest_status.created_at).toLocaleString() }}
                                </p>
                                <div class="text-right text-gray-500">
                                    <Link :href="route('website.show', website.id)" class="text-sm leading-5 font-medium text-indigo-600 hover:text-indigo-500">
                                        View
                                    </Link>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>
