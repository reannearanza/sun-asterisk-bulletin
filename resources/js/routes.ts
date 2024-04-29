export const Routes = [
  {
    path: '/articles',
    name: 'home',
    component: () => import('./views/Home.vue'),
    children: [
      {
        path: '',
        name: 'articles',
        component: () => import('./views/ArticleList.vue')
      },
      {
        path: ':id',
        name: 'show-article',
        component: () => import('./views/ShowArticle.vue')
      },
      {
        path: 'create',
        name: 'create-article',
        component: () => import('./views/CreateArticle.vue')
      }
    ]
  },
  {
    path: '/login',
    name: 'login',
    component: () => import('./views/Login.vue')
  }
]