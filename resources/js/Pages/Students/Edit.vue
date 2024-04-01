<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import TextInput from '@/Components/TextInput.vue';
import InputLabel from '@/Components/InputLabel.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { Head, useForm } from "@inertiajs/vue3";

const props = defineProps({
    student: {
        type: Object,
        default: () => ({}),
    },
});

const form = useForm({
    id: props.student.id,
    name: props.student.name,
    age: props.student.age,
    status: props.student.status,
});

const submit = () => {
    form.put(route("students.update", props.student.id));
};
</script>

<template>
    <Head title="Student Edit" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Student Edit
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <form @submit.prevent="submit">
                            <div>
                                <InputLabel for="name" value="Name" />

                                <TextInput id="name" type="text" class="mt-1 block w-full" v-model="form.name" required
                                    autofocus autocomplete="name" />

                                <InputError class="mt-2" :message="form.errors.name" />
                            </div>
                            <div class="my-6">
                                <InputLabel for="age" value="Age" />

                                <TextInput id="age" type="number" class="mt-1 block w-full" v-model="form.age" required />

                                <InputError class="mt-2" :message="form.errors.age" />
                            </div>
                            <div class="my-6">
                                <InputLabel for="status" value="Status" />

                                <select id="status" class="mt-1 block w-full" v-model="form.status" required>
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>

                                <InputError class="mt-2" :message="form.errors.status" />
                            </div>
                            <PrimaryButton type="submit" :class="{ 'opacity-25': form.processing }"
                                :disabled="form.processing">
                                Submit
                            </PrimaryButton>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
