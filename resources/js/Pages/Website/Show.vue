<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
import Button from '@/Components/Button.vue';
import getStatusColor from '@/Composables/StatusColor';

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
          <Link :href="route('dashboard')" class="text-gray-600">
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
            <Link :href="route('website.destroy', { id: props.website.id })" method="DELETE" class="text-gray-600">
            <Button>Delete</Button>
            </Link>
          </div>
          <div class="p-6 bg-white text-lg">
            <p>Name: {{ props.website.name }}</p>
            <p>Url: <a class="text-indigo-600 hover:text-indigo-900 focus:outline-none focus:underline" :href="props.website.url" target="blank" >{{ props.website.url }}</a></p>
          </div>
          <div class="text-2xl px-6 py-3">
            <h1 class="font-bold">History:</h1>
          </div>
          <div class="overflow-x-auto">
            <table class="w-full whitespace-nowrap">
              <thead>
                <tr>
                  <th
                    class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                    Status
                  </th>
                  <th
                    class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                    Error
                  </th>
                  <th
                    class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                    Time Checked
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="status in props.website.statuses" class="hover:bg-blue-100 transition-all">
                  <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                    <div class="font-bold" :class="getStatusColor(status.status)">
                      {{ status.status }}
                    </div>
                  </td>
                  <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                    <div class="text-sm leading-5 text-gray-500">
                      {{ status.error }}
                    </div>
                  </td>
                  <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                    <div class="text-sm leading-5 text-gray-500">
                      {{ status.created_at }}
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </BreezeAuthenticatedLayout>
</template>
