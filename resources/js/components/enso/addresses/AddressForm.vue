<template>

    <modal show
        v-on="$listeners"
        container="address-form">
        <vue-form class="box has-background-light"
            v-bind="$attrs"
            v-on="$listeners"
            @loaded="ready = true; $emit('loaded')"
            ref="form">
            <template v-for="field in customFields"
                v-if="field.meta.custom"
                :slot="field.name"
                slot-scope="{ field, errors}">
                <slot :name="field.name"
                    :field="field"
                    :errors="errors"/>
            </template>
        </vue-form>
    </modal>

</template>

<script>

import { library } from '@fortawesome/fontawesome-svg-core';
import { faLocationArrow } from '@fortawesome/free-solid-svg-icons';
import VueForm from '../vueforms/VueForm.vue';
import Modal from '../bulma/Modal.vue';

library.add(faLocationArrow);

export default {
    name: 'AddressForm',

    components: { Modal, VueForm },

    data: () => ({
        ready: false,
    }),

    computed: {
        customFields() {
            return this.ready
                ? this.$refs.form.customFields
                : [];
        },
    },

    methods: {
        field(field) {
            return this.ready
                ? this.$refs.form.field(field)
                : null;
        },
    },
};

</script>

<style lang="scss">

    .address-form {
        .modal-content {
            width: 70%;
        }
    }

</style>
