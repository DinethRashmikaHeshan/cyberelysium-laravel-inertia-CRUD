<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
// import { useForm } from '@inertiajs/vue3';
// import { router } from '@inertiajs/vue3';
// const form=useForm({
//     name:null;
//     age:null;
//     image:null;
//     status:null;
// });

// function submit(){
//     router.post('/student',form)
// }
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">You're logged in!
                        <!-- <form @submit.prevent="submit">
                        <div class="mb-3">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" id="name" v-model="form.name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="age">Age:</label>
                            <input type="number" class="form-control" id="age" name="age" v-model="form.age" required>
                        </div>
                        <div class="mb-3">
                            <label for="image">Upload Image:</label>
                            <input type="file" class="form-control-file" id="image" name="image" v-model="form.image">
                        </div>
                        <div class="mb-3">
                            <label for="status">Status:</label>
                            <select class="form-control" id="status" name="status" v-model="form.status">
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        </form> -->
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
