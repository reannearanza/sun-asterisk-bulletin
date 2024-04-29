export interface Comment {
  key: string
  articleKey: string
  comment: string
  author: {
    id: number
    name: string
  }
  createdAt: string
  updatedAt: string
}