<template lang="">
    <Head :title="data.title"/>
    <main class="py-12 md:px-16 xl:px-28 px-3">
        <Link href="/" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Back</Link>
        <h1 class="text-center mt-6 text-3xl font-semibold mb-8">
            {{ data.title }}
        </h1>
        <span v-if="data.image == null">
            No image
        </span e>
        <img v-else :src="`${url}/${data.image}`" class="w-56 block mx-auto mb-6" alt="image" srcset="">
        <article>
            <p class="text-justify">
                {{ data.content }}
            </p>
        </article>
    </main>
</template>
<script>
import { Head, Link } from '@inertiajs/vue3'
export default {
    props: {    
        data: Object,
        url: String
    },

    components: {
        Head,
        Link
    }
}
</script>
<style lang="">
    
</style>