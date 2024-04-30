import axios from 'axios';

export const Routes = [
  {
    path: '/',
    name: 'app',
    component: () => import('./app.vue'),
    beforeEnter: (to, from, next) => {
      if (!localStorage.getItem('token')) {
        return next({ name: 'login' });
      }

      axios.interceptors.request.use((config) => {
        config.headers['Authorization'] = `Bearer ${localStorage.getItem('token')}`;
        return config;
      });

      return next({ name: 'articles' });
    },
  },
  {
    path: '/articles',
    name: 'home',
    component: () => import('./views/Home.vue'),
    beforeEnter: (to, from, next) => {
      if (!localStorage.getItem('token')) {
        return next({ name: 'login' });
      }

      axios.interceptors.request.use((config) => {
        config.headers['Authorization'] = `Bearer ${localStorage.getItem('token')}`;
        return config;
      });

      return next();
    },
    children: [
      {
        path: '',
        name: 'articles',
        component: () => import('./views/ArticleList.vue')
      },
      {
        path: '/articles/:id',
        name: 'show-article',
        component: () => import('./views/ShowArticle.vue')
      },
      {
        path: '/articles/create',
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