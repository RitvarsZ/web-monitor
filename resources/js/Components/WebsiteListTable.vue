<script setup>
import getStatusColor from '@/Composables/StatusColor.js';
import { Link } from '@inertiajs/inertia-vue3';

const props = defineProps({
  websites: {
    type: Array,
    required: true,
  },
});
</script>

<template>
<div class="overflow-x-auto">
  <table class="w-full whitespace-nowrap">
    <thead>
      <tr>
        <th
          class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
          Name
        </th>
        <th
          class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
          Status
        </th>
        <th
          class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
          Last checked
        </th>
        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50"></th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="website in props.websites" :key="website.id">
        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
          <div class="flex items-center">
            <div class="ml-4">
              <div class="text-sm leading-5 font-medium text-gray-900">
                {{ website.name }}
              </div>
              <div class="text-sm leading-5 text-gray-500">
                {{ website.url }}
              </div>
            </div>
          </div>
        </td>
        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
          <div v-if="website.latest_status" class="font-bold" :class="getStatusColor(website.latest_status.status)">
            {{ website.latest_status.status }}
          </div>
          <div v-if="website.latest_status">
            {{ website.latest_status.error }}
          </div>
        </td>
        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
          <div v-if="website.latest_status" class="text-sm">
            {{ new Date(website.latest_status.created_at).toLocaleString() }}
          </div>
        </td>
        <td class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-200 text-sm leading-5 font-medium">
          <Link :href="route('website.show', { id: website.id })">
            <button class="text-indigo-600 hover:text-indigo-900 focus:outline-none focus:underline">
              View
            </button>
          </Link>
        </td>
      </tr>
    </tbody>
  </table>
</div>
</template>