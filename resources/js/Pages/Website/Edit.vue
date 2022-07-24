<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head, useForm } from '@inertiajs/inertia-vue3';
import Button from '@/Components/Button.vue';
import Label from '@/Components/Label.vue';
import Input from '@/Components/Input.vue';
import InputError from '@/Components/InputError.vue';

const props = defineProps({
    website: {
        type: Object,
        required: true,
    },
});

const form = useForm({
    name: props.website.name,
    url: props.website.url,
});

function submit() {
    form.post(route('website.update', { id: props.website.id }));
}
</script>

<template>
    <Head title="Add a website" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Edit {{ props.website.name }}
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <form @submit.prevent="submit" class="flex flex-col gap-4">
                            <div class="flex gap-4 items-center flex-wrap">
                                <Label for="name">Name:</Label>
                                <Input id="name" v-model="form.name" autofocus required />
                                <InputError v-if="form.errors.name" :message="form.errors.name" />
                            </div>
                            <div class="flex gap-4 items-center flex-wrap">
                                <Label for="url">Url:</Label>
                                <Input id="url" v-model="form.url" required />
                                <InputError v-if="form.errors.url" :message="form.errors.url" />
                            </div>
                            <div>
                                <Button type="submit" class="w-">Save</Button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>
