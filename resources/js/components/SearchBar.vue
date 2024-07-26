<template>
    <div class="search-bar">
        <input
            v-model="searchQuery"
            @input="debounceSearch"
            type="text"
            placeholder="Search posts..."
        >
    </div>
</template>

<script>
import { debounce } from 'lodash';

export default {
    name: 'SearchBar',
    data() {
        return {
            searchQuery: ''
        };
    },
    methods: {
        debounceSearch: debounce(function() {
            this.$emit('search', this.searchQuery);
        }, 300)
    }
};
</script>

<style scoped>
.search-bar {
    margin-bottom: 20px;
}

input {
    width: 100%;
    padding: 10px;
    font-size: 16px;
    border: 1px solid #ddd;
    border-radius: 4px;
}
</style>
