<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { Head } from '@inertiajs/vue3'

defineProps({
  restaurant: {
    type: Object
  }
})
</script>

<template>
  <Head :title="restaurant.name" />

  <AuthenticatedLayout>
    <template #header>
      <h2 class="text-xl font-semibold leading-tight text-gray-800">
        {{ restaurant.name }}
      </h2>
    </template>

    <div class="py-12">
      <div class="mx-auto max-w-2xl sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
          <div class="flex flex-col gap-8 overflow-x-scroll p-6 text-gray-900">
            <div
              v-for="category in restaurant.categories"
              :key="category.id"
              class="flex flex-col gap-4"
            >
              <div class="flex justify-between">
                <div class="">
                  <div class="text-2xl font-bold">{{ category.name }}</div>
                </div>
              </div>
              <div class="flex flex-col gap-6">
                <div
                  v-for="product in category.products"
                  :key="product.id"
                  class="flex justify-between gap-4 border-b pb-6"
                >
                  <div class="flex grow flex-col gap-2">
                    <div class="font-bold">{{ product.name }}</div>
                    <div class="">{{ (product.price / 100).toFixed(2) }} &euro;</div>
                    <div class="flex grow items-end">
                      <button class="btn btn-primary btn-sm" type="button">
                        Add {{ (product.price / 100).toFixed(2) }} &euro; (Coming soon)
                      </button>
                    </div>
                  </div>

                  <div class="w-48 flex-none">
                    <img
                      class="aspect-video w-full rounded"
                      :src="`https://picsum.photos/seed/${product.id}/200/110?blur=2`"
                    />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
