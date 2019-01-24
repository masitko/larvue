<template>

    <div class="columns is-centered">
        <div class="column is-three-quarters-desktop is-full-touch">
            <!-- <enso-form class="box has-background-light raises-on-hover animated fadeIn"/> -->
            <enso-form class="box has-background-light raises-on-hover animated fadeIn"
                @loaded="ready = true"
                ref="form"/>
            <div v-if="ready">
                <accessories addresses
                    documents
                    type="App\School"
                    :id="$refs.form.routeParam('school')">
                    <!-- <template slot="custom"
                        slot-scope="{count}">
                        <tab keep-alive
                             id="Contacts">
                            <contacts controls
                                :id="$refs.form.routeParam('school')"
                                route-key="school"
                                route-prefix="administration.schools.contacts"
                                @update="$set(count, 'contacts', $refs.contacts.count)"
                                ref="contacts"/>
                        </tab>
                    </template> -->
                </accessories>
            </div>
        </div>
    </div>

</template>

<script>

import Accessories from '../../../components/enso/bulma/Accessories.vue';
import EnsoForm from '../../../components/enso/vueforms/EnsoForm.vue';
// import Contacts from '../../../components/enso/contacts/Contacts.vue';
import Tab from '../../../components/enso/bulma/Tab.vue';

export default {
    components: {
        EnsoForm, Accessories, Tab,
    },

    data: () => ({
        ready: false,
    }),
};

</script>

