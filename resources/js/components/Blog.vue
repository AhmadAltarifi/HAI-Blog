<template>
    <div>
        <h1>My Blog</h1>
        <search-bar @search="performSearch"></search-bar>
        <post-list :posts="posts"></post-list>
    </div>
</template>

<script>
import SearchBar from './SearchBar.vue';
import PostList from './PostList.vue';
import axios from 'axios';

export default {
    name: 'Blog',
    components: {
        SearchBar,
        PostList
    },
    data() {
        return {
            posts: []
        };
    },
    methods: {
        async performSearch(query) {
            try {
                const response = await axios.get(`/api/v1/posts/search?q=${query}`);
                this.posts = response.data;
            } catch (error) {
                console.error('Error fetching posts:', error);
            }
        },
        async fetchPosts() {
            try {
                const response = await axios.get('/api/v1/posts');
                this.posts = response.data;
            } catch (error) {
                console.error('Error fetching posts:', error);
            }
        }
    },
    mounted() {
        console.log('Blog component mounted.');
        this.fetchPosts();
    }
};
</script>


<style>
    #app {
        font-family: Arial, sans-serif;
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
    }

    h1 {
        text-align: center;
        color: #333;
    }
</style>
