const allposts = async () => {
    let posts = await fetch("http://localhost:3000/posts")
   let answer = await posts.json()
   

   answer.map ( data => {
   let card = `<ol>
   <li>first list </li></ol>`
   })
}
allposts()

const postsdiv = document.getElementsByClassName("postsdiv")