<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { Head, Link } from '@inertiajs/vue3'

const props = defineProps({
  restaurants: {
    type: Array
  }
})
</script>

<template>
  <Head title="Home" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="text-xl font-semibold leading-tight text-gray-800">Home</h2>
    </template>

    <div class="py-12">
      <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
          <div class="p-6 text-gray-900">
            <div class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-3">
              <div v-for="restaurant in restaurants" :key="restaurant.id">
                <Link :href="route('restaurant', restaurant)" class="flex flex-col gap-2">
                  <div>
                    <img
                      class="aspect-video w-full rounded-xl"
                      :src="`https://picsum.photos/seed/${restaurant.id}/380/220?blur=2`"
                      alt=""
                    />
                  </div>
                  <div class="truncate text-lg font-bold">
                    {{ restaurant.name }} ({{ restaurant.address }})
                  </div>
                </Link>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
