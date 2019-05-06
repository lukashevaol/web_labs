<template lang="pug">
  .container
    .row
      .col-xs-12
        h1
          | Add New Doc
        form
          .form-group
            input.form-control( type="text", name="title", id="title", placeholder="Title", v-model.trim="post.title" )
          .form-group
            textarea.form-control( type="text", rows="5", name="description", id="description", placeholder="Content", v-model.trim="post.description" )
          .form-group
            button.btn.btn-block.btn-primary( type="button", name="addPost", id="addPost", @click="addPost()" )
              | add new doc
          section
            button.btn.btn-success.btn-block( type="button", @click="goBack()" )
              | go to docs page
</template>

<script>
  import PostsService from 'D:\\универ\\web2019\\web_labs\\lab5\\md-editor\\src\\services\\PostsService'
  export default {
    name: 'NewPostPage',
    data () {
      return {
        post: {
          title: '',
          description: ''
        }
      }
    },
    methods: {
      async addPost () {
        if (this.post.title !== '' && this.post.description !== '') {
          await PostsService.addNewPost({
            title: this.post.title,
            description: this.post.description
          })
          this.$router.push({ name: 'Posts' })
        } else {
          alert('Empty fields!')
        }
      },
      goBack () {
        this.$router.push({ name: 'Posts' })
      }
    }
  }
</script>