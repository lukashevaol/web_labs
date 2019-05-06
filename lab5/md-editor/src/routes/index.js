import Start from 'D:\\универ\\web2019\\web_labs\\lab5\\md-editor\\src\\components\\pages\\PostsPage'
import Posts from 'D:\\универ\\web2019\\web_labs\\lab5\\md-editor\\src\\components\\pages\\PostsPage'
import NewPost from 'D:\\универ\\web2019\\web_labs\\lab5\\md-editor\\src\\components\\pages\\NewPostPage'
const routes = [
  {
    path: '/',
    name: 'Start',
    component: Start
  },
  {
    path: '/posts',
    name: 'Posts',
    component: Posts
  },
    {
    path: '/posts/new',
    name: 'NewPost',
    component: NewPost
  }
]
export default routes