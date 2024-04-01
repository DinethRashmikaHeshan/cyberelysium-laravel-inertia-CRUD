<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";

const props = defineProps({
    students: {
        type: Array,
        default: () => [],
    },
});

const form = useForm({});

function destroy(id) {
    if (confirm("Are you sure you want to Delete")) {
        form.delete(route("students.destroy", id));
    }
}
</script>

<template>
    <Head title="Students" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Students Index
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="mb-2">
                            <Link :href="route('students.create')">
                                <PrimaryButton>Add Student</PrimaryButton>
                            </Link>
                        </div>
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">#</th>
                                        <th scope="col" class="px-6 py-3">
                                            Name
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Age
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Status
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="student in students" :key="student.id" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-black whitespace-nowrap">{{ student.id }}</th>
                                        <td class="px-6 py-4 font-medium text-gray-900 dark:text-black whitespace-nowrap">{{ student.name }}</td>
                                        <td class="px-6 py-4 font-medium text-gray-900 dark:text-black whitespace-nowrap">{{ student.age }}</td>
                                        <td class="px-6 py-4 font-medium text-gray-900 dark:text-black whitespace-nowrap">{{ student.status }}</td>
                                        <td class="px-6 py-4">
                                            <Link :href="route('students.edit', student.id)" class="px-4 py-2 text-white bg-blue-600 rounded-lg">Edit</Link>
                                            <PrimaryButton class="px-4 py-2 text-white bg-red-600 rounded-lg" @click="destroy(student.id)">Delete</PrimaryButton>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
