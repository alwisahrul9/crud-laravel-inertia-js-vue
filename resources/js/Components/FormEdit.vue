<template lang="">
    <div class="max-w-lg mx-auto">
        <Link href="/" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-green-600 dark:hover:bg-green-700 focus:outline-none dark:focus:ring-green-800">
            Back
        </Link>
        <form @submit.prevent="submit" class="bg-white border p-6 mt-6 rounded-md shadow-md">
            <div class="mb-5">
                <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                <input type="text" v-model="form.title" id="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Your title" required />
            </div>
            <div class="mb-5">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload image</label>
                <input @input="form.image = $event.target.files[0]" accept="image/png, image/jpeg" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file">
                <progress v-if="form.progress" :value="form.progress.percentage" max="100">
                    {{ form.progress.percentage }}%
                </progress>
            </div>
            <div class="mb-5">
                <label for="content" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Content</label>
                <textarea id="content" v-model="form.content" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here..."></textarea>
            </div>
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save</button>
        </form>
    </div>
</template>
<script>
import { Link } from '@inertiajs/vue3' 
import { router } from '@inertiajs/vue3'
import { reactive } from 'vue'

export default {
    components:{
        Link
    },

    props: {
        data: Object
    },

    setup(props){
        const data = props.data

        const form = reactive({
            title: data.title,
            image: null,
            content: data.content
        })

        const submit = () => {
            router.post(`/data/${data.id}`, {
                _method: 'put',
                title: form.title,
                image: form.image,
                content: form.content
            })
        }

        return { form, submit, data }
    }
}
</script>
<style lang="">
    
</style>