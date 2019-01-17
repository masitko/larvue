const SchoolShow = () => import('../../../pages/administration/schools/Show.vue');

export default {
    name: 'administration.schools.show',
    path: ':school',
    component: SchoolShow,
    meta: {
        breadcrumb: 'show',
        title: 'School Profile',
    },
};
