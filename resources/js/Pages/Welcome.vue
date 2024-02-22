<template lang="">
  <Head title="Article List" />
  <div v-if="$page.props.flash.message" class="fixed top-5 right-5" role="alert">
    <div class="flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert">
        <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
            </svg>
            <span class="sr-only">Check icon</span>
        </div>
        <div class="ms-3 text-sm font-normal">{{ $page.props.flash.message }}</div>
    </div>
  </div>
  <div class="py-16 md:px-16 xl:px-28 px-3">
    <Link href="/add-data" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
        Add Data
    </Link>
    <Table :data="data" :url="url"/>
  </div>
</template>
<script>
import Table from "../Components/Table.vue";
import Form from "../Components/Form.vue";
import { Head, Link } from "@inertiajs/vue3";

export default {
    props: {
        data: Object,
        url: String
    },

    components: {
        Table,
        Form,
        Link,
        Head,
    }
};
</script>
