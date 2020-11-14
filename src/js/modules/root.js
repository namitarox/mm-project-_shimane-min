import { home } from '../projects/home'
// import { single } from './single'

export function root() {
  const pathName = location.pathname
  // const pathName = this.model.pathName
  console.log(pathName)
  switch (true) {
    case /^\/$/.test(pathName):
      home()
      break
    default:
      home()
      // single()
      break
  }
}
