<template lang="pug">
  .container
    .row
      .col-md-12
        h1
          | Docs
        h3
          | This page will list all the docs

        section.panel.panel-success( v-if="posts.length" )
          .panel-heading
            | list of docs
          table.table.table-striped
            tr
              th Title
              th Description
              th Action
            tr( v-for="post in posts", :key="post.title" )
              td {{ post.title }}
              td {{ post.description }}

        section.panel.panel-danger( v-if="posts.length < 1")
          p
            | There are no docs ... Lets add one now!
          div
            router-link( :to="{ name: 'NewPost' }" )
              | add new doc
</template>

<script>
  import PostsService from 'D:\\универ\\web2019\\web_labs\\lab5\\md-editor\\src\\services\\PostsService'
  export default {
    name: 'PostsPage',
    data () {
      return {
        posts: []
      }
    },
    methods: {
      async getPosts () {
        const response = await PostsService.fetchPosts();
        this.posts = response.data.posts;
        console.log(this.posts);
      }
    },
    mounted () {
      this.getPosts()
    }
  }
</script>