<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import {Head, Link} from '@inertiajs/vue3'

defineProps({
    restaurants: {
        type: Array
    }
})
</script>

<template>
    <Head title="Restaurants"/>

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">Restaurants</h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <Link v-if="can('restaurant.create')" class="btn btn-primary" :href="route('admin.restaurants.create')">
                            Add New Restaurant
                        </Link>
                    </div>
                    <div class="overflow-x-scroll p-6 text-gray-900">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Restaurant Name</th>
                                <th>City</th>
                                <th>Address</th>
                                <th>Owner Name</th>
                                <th>Owner Email</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="restaurant in restaurants" :key="restaurant.id">
                                <td>{{ restaurant.id }}</td>
                                <td>{{ restaurant.name }}</td>
                                <td>
                                    <div class="badge badge-primary">{{ restaurant.city.name }}</div>
                                </td>
                                <td>{{ restaurant.address }}</td>
                                <td>{{ restaurant.owner.name }}</td>
                                <td>
                                    <a :href="'mailto:' + restaurant.owner.email" class="text-link">
                                        {{ restaurant.owner.email }}
                                    </a>
                                </td>
                                <td>
                                    <Link v-if="can('restaurant.update')" :href="route('admin.restaurants.edit', restaurant)" class="btn btn-secondary">
                                        Edit
                                    </Link>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
