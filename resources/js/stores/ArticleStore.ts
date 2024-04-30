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
      .get('/api/articles')
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
      .get(`/api/articles/${key}`)
      .then((response) => {
        article.value = response.data;
        resolve(response.data);
      })
      .catch((error) => {
        reject(error);
      });
    })
  };

  const createArticle = (payload: any) => {
    return new Promise((resolve, reject) => {
      axios
      .post('/api/articles', payload)
      .then((response) => {
        resolve(response.data);
      })
      .catch((error) => {
        reject(error);
      });
    })
  };

  const updateArticle = (key: string, payload: any) => {
    return new Promise((resolve, reject) => {
      axios
      .put(`/api/articles/${key}`, payload)
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
      .delete(`/api/articles/${key}`)
      .then((response) => {
        resolve(response.data);
      })
      .catch((error) => {
        reject(error);
      });
    })
  };

  const toggleUpvote = (key: string) => {
    return new Promise((resolve, reject) => {
      axios
      .put(`/api/articles/${key}/upvote`)
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
    deleteArticle,
    toggleUpvote
  };
}

export const useArticleStore = defineStore('articleStore', setup);