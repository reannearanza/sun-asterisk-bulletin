export interface Article {
  key: string
  title: string
  content: string
  author: {
    id: number
    name: string
  },
  comments: number
  upvotes: number
  upvotedByUser: boolean
  createdAt: string
  updatedAt: string
}