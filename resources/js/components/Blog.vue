<template>
    <div class="container">
        <div class="row">
            <h1 class="text-center">Blog Posts</h1>
        </div>
        <div class="row">
            <input v-model="query" @input="search" placeholder="Search...">
            <ul>
                <li v-for="post in posts" :key="post.id">{{ post.title }}</li>
            </ul>
        </div>
        <div v-for="post in posts" :key="post.id">
            <h2>{{ post.title }}</h2>
            <p>{{ post.body }}</p>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            query: '',
            posts: []
        };
    },
    methods: {
        search() {
            axios.get(`/api/v1/posts?query=${this.query}`).then(response => {
                this.posts = response.data;
            });
        }
    }
};
</script>
