import { ref } from 'vue';
import { defineStore } from 'pinia';
import { Article } from '../types/Articles';
import axios from 'axios';

const setup = () => {
  const articleList = ref<Article[]>([]);
  const article = ref<Article>({} as Article);

  const getArticleList = () => {
    return new Promise((resolve, reject) => {
      axios
      .get('/articles')
      .then((response) => {
        articleList.value = response.data;
        resolve(response.data);
      })
      .catch((error) => {
        reject(error);
      });
    })
  };

  const getArticle = (key: string) => {
    return new Promise((resolve, reject) => {
      axios
      .get(`/articles/${key}`)
      .then((response) => {
        article.value = response.data;
        resolve(response.data);
      })
      .catch((error) => {
        reject(error);
      });
    })
  };

  const createArticle = (article: any) => {
    return new Promise((resolve, reject) => {
      axios
      .post('/articles', article)
      .then((response) => {
        resolve(response.data);
      })
      .catch((error) => {
        reject(error);
      });
    })
  };

  const updateArticle = (key: string, article: any) => {
    return new Promise((resolve, reject) => {
      axios
      .put(`/articles/${key}`, article)
      .then((response) => {
        resolve(response.data);
      })
      .catch((error) => {
        reject(error);
      });
    })
  };

  const deleteArticle = (key: string) => {
    return new Promise((resolve, reject) => {
      axios
      .delete(`/articles/${key}`)
      .then((response) => {
        resolve(response.data);
      })
      .catch((error) => {
        reject(error);
      });
    })
  };

  return {
    articleList,
    article,
    getArticleList,
    getArticle,
    createArticle,
    updateArticle,
    deleteArticle
  };
}

export const articleStore = defineStore('articleStore', setup);