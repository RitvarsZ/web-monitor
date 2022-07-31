<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
import Button from '@/Components/Button.vue';
import WebsiteListTable from '@/Components/WebsiteListTable.vue';

const props = defineProps({
  websites: {
    type: Array,
    required: true,
  }
});

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
              <div v-else>Showing {{ websites.length }} monitored {{ websites.length == 1 ? 'site' : 'sites' }}.</div>
            </div>

            <WebsiteListTable :websites="props.websites" />
          </div>
        </div>
      </div>
    </div>
  </BreezeAuthenticatedLayout>
</template>
