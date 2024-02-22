<template>
    <Head :title="`Edit ${data.title}`"/>
    <div class="pt-28 px-3">
        <FormEdit :data="data" />
    </div>
</template>
<script>
    import FormEdit from '../Components/FormEdit.vue'
    import { Head } from '@inertiajs/vue3'
    export default {
        props: {
            data: Object
        },
        components: {
            FormEdit,
            Head
        }
    }
</script>
<style>
    
</style>