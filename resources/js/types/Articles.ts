export interface Article {
  key: string
  title: string
  content: string
  author: {
    id: number
    name: string
  }
  createdAt: string
  updatedAt: string
}