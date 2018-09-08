<template>

    <div>
        <comment is-new
            :id="id"
            :type="type"
            v-if="comment"
            :comment="comment"
            :index="-1"
            @cancel-add="comment = null"
            @save-comment="add()"/>
        <comment v-for="(comment, index) in filteredComments"
            :comment="comment"
            :index="index"
            @save-comment="update(comment)"
            @delete="destroy(index)"
            :key="index"/>
        <div class="has-text-centered has-margin-top-large">
            <button class="button is-naked has-text-grey"
                @click="get()">
                &bull; &bull; &bull;
            </button>
        </div>
    </div>

</template>

<script>

import { mapState } from 'vuex';
import Comment from './Comment.vue';

export default {
    name: 'Comments',

    components: { Comment },

    props: {
        id: {
            type: Number,
            required: true,
        },
        type: {
            type: String,
            required: true,
        },
        paginate: {
            type: Number,
            default: 100,
        },
        query: {
            type: String,
            default: null,
        },
    },

    data() {
        return {
            comments: [],
            count: 0,
            offset: 0,
            comment: null,
            loading: false,
            path: this.$route.path,
        };
    },

    computed: {
        ...mapState(['user']),
        filteredComments() {
            return this.query
                ? this.comments.filter(comment => comment.body.toLowerCase()
                    .indexOf(this.query.toLowerCase()) > -1
                    || comment.owner.name.toLowerCase().indexOf(this.query.toLowerCase()) > -1)
                : this.comments;
        },
    },

    created() {
        this.get();
    },

    methods: {
        get() {
            this.loading = true;

            axios.get(
                route('core.comments.index'),
                { params: this.getParams() },
            ).then(({ data }) => {
                this.comments = this.offset
                    ? this.comments.concat(data.data)
                    : data.data;

                this.count = data.count;
                this.offset = this.comments.length;
                this.loading = false;
                this.$emit('update');
            }).catch(error => this.handleError(error));
        },
        getParams() {
            return {
                commentable_id: this.id,
                commentable_type: this.type,
                offset: this.offset,
                paginate: this.paginate,
            };
        },
        refresh() {
            this.offset = 0;
            this.get();
        },
        factory() {
            return {
                body: '',
                taggedUsers: [],
                owner: {
                    avatarId: this.user.avatar.id,
                    name: this.user.name,
                },
            };
        },
        create() {
            if (this.comment) {
                return;
            }

            this.comment = this.factory();
        },
        add() {
            if (!this.comment.body.trim()) {
                return;
            }

            this.loading = true;

            axios.post(
                route('core.comments.store'),
                this.postParams(),
            ).then(({ data }) => {
                this.comments.unshift(data.comment);
                this.count = data.count;
                this.offset++;
                this.comment = null;
                this.loading = false;
                this.$emit('update');
            }).catch(error => this.handleError(error));
        },
        postParams() {
            return {
                commentable_id: this.id,
                commentable_type: this.type,
                body: this.comment.body,
                taggedUsers: this.comment.taggedUsers,
                path: this.path,
            };
        },
        update(comment) {
            this.syncTaggedUsers(comment);
            comment.path = this.path;
            this.loading = true;

            axios.patch(
                route('core.comments.update', comment.id),
                comment,
            ).then(({ data }) => {
                Object.assign(comment, data);
                this.loading = false;
                this.$emit('update');
            }).catch(error => this.handleError(error));
        },
        syncTaggedUsers(comment) {
            comment.taggedUsers.forEach((user, index) => {
                if (!comment.body.includes(user.fullName)) {
                    comment.taggedUsers.splice(index, 1);
                }
            });
        },
        destroy(index) {
            this.loading = true;

            axios.delete(route('core.comments.destroy', this.comments[index].id))
                .then(({ data }) => {
                    this.comments.splice(index, 1);
                    this.count = data.count;
                    this.loading = false;
                    this.$emit('update');
                }).catch(error => this.handleError(error));
        },
    },
};

</script>

<style scoped>

    .wrapper {
        max-height: 500px;
        overflow-y: auto;
    }

</style>