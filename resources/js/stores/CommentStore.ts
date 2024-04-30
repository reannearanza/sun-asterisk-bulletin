import { defineStore } from "pinia";
import { Comment } from "../types/Comments";
import { ref } from "vue";
import axios from "axios";

const setup = () => {
  const commentList = ref<Comment[]>([]);
  const comment = ref<Comment>({} as Comment);

  const getCommentList = (articleKey: string) => {
    return new Promise((resolve, reject) => {
      axios
      .get(`/api/articles/${articleKey}/comments/`)
      .then((response) => {
        commentList.value = response.data;
        resolve(response.data);
      })
      .catch((error) => {
        reject(error);
      });
    })
  };
  
  const createComment = (articleKey: string, payload: any) => {
    return new Promise((resolve, reject) => {
      axios
      .post(`/api/articles/${articleKey}/comments`, payload)
      .then((response) => {
        resolve(response.data);
      })
      .catch((error) => {
        reject(error);
      });
    })
  };

  return {
    commentList,
    comment,
    getCommentList,
    createComment
  }
}

export const useCommentStore = defineStore('commentStore', setup)