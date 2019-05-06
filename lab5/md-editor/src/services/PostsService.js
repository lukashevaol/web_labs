import api from 'D:\\универ\\web2019\\web_labs\\lab5\\md-editor\\src\\services\\api'
export default {
  fetchPosts () {
    return api().get('posts')
  },
  addNewPost (params) {
    return api().post('posts', params)
  }
}
