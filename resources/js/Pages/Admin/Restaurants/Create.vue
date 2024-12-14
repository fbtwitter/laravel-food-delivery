<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {Head, useForm} from "@inertiajs/vue3";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";

defineProps({
    cities: {
        type: Array
    }
})

const form = useForm({
    restaurant_name: "",
    email: "",
    owner_name: "",
    city_id: "",
    address: ""
})

const submit = () => {
    form.post(route("admin.restaurant.store"))
}
</script>

<template>
    <Head title="Add New Restaurant" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Add New Restaurant</h2>
        </template>
        <div class="py-12">
           <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
               <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                   <div class="p-6 text-gray-900 overflow-x-scroll">
                       <div class="p-6 text-gray-900 overflow-x-scroll">
                           <form @submit.prevent="submit" class="flex flex-col gap-4">
                               <div class="form-group">
                                   <InputLabel for="restaurant_name" value="Restaurant Name" />
                                   <TextInput id="restaurant_name" type="text" v-model="form.restaurant_name" :disabled="form.processing"  />
                                   <InputError :message="form.errors.restaurant_name" />
                               </div>
                               {{form.restaurant_name}}
                               <div class="form-group">
                                   <InputLabel for="email" value="Owner Email" />
                                   <TextInput id="email" type="email" v-model="form.email" :disabled="form.processing" />
                                   <InputError :message="form.errors.email" />
                               </div>
                               {{form.email}}
                               <div class="form-group">
                                   <InputLabel for="city_id" value="City" />
                                   <SelectInput />
                               </div>
                           </form>
                       </div>
                   </div>
               </div>
           </div>
        </div>
    </AuthenticatedLayout>
</template>
