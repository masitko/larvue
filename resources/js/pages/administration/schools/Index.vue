<template>

    <vue-table class="box has-background-light is-paddingless raises-on-hover is-rounded"
        :path="path"
        id="schools"/>

</template>

<script>

import VueTable from '../../../components/enso/vuedatatable/VueTable.vue';

export default {
    components: { VueTable },

    data() {
        return {
            path: route('administration.schools.initTable'),
        };
    },
};

</script>

<style lang="scss">
</style>
