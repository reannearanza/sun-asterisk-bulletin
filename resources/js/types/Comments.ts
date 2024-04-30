export interface Comment {
  key: string
  articleKey: string
  comment: string
  author: {
    id: number
    name: string
    username: string
  }
  createdAt: string
  updatedAt: string
}