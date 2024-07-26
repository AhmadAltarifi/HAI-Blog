<template>
    <div class="post-list">
        <div v-if="posts.length === 0" class="no-results">
            No posts found.
        </div>
        <div v-else v-for="post in posts" :key="post.id" class="post">
            <h2>{{ post.title }}</h2>
            <p>{{ post.excerpt }}</p>
            <div class="post-meta">
                <span>By: {{ post.author }}</span>
                <span>Date: {{ formatDate(post.created_at) }}</span>
            </div>
            <div class="post-tags">
                <span v-for="tag in post.tags" :key="tag.id" class="tag">
                    {{ tag.name }}
                </span>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'PostList',
        props: {
        posts: {
            type: Array,
            required: true
        }
        },
        methods: {
        formatDate(dateString) {
            return new Date(dateString).toLocaleDateString();
        }
        }
    };
</script>

<style scoped>
  .post-list {
    display: grid;
    gap: 20px;
  }

  .post {
    border: 1px solid #ddd;
    border-radius: 4px;
    padding: 15px;
    background-color: #f9f9f9;
  }

  h2 {
    margin-top: 0;
    color: #333;
  }

  .post-meta {
    font-size: 0.9em;
    color: #666;
    margin-top: 10px;
  }

  .post-tags {
    margin-top: 10px;
  }

  .tag {
    display: inline-block;
    background-color: #e0e0e0;
    padding: 2px 8px;
    border-radius: 12px;
    font-size: 0.8em;
    margin-right: 5px;
  }

  .no-results {
    text-align: center;
    color: #666;
    font-style: italic;
  }
</style>
