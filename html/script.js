const postsdiv = document.querySelector("#postsdiv")
const  btn =document.querySelector(".btn") 
const url ="http://localhost:3000/posts"

const submit = (e) => {
   const post = fetch(url,{method:"POST"})
    console.log("post")
}

btn.addEventListener("click",submit())

const allPosts = async () => {
    let Posts = await fetch("http://localhost:3000/posts")
   let answer = await Posts.json()

  let div=""
  answer.map( data => {
    div += `
     <div class="card" style="width: 100rem;"
     <div class="card-body">
          <h5 class="card-title">this is card</h5>
          <h6 class="card-subtitle mb-2 text-body-secondary">my card</h6>
          <p class="card-text">${data.title}</p>
          <p class="card-text">${data.description}</p>
          <p class="card-text">${data.views}</p>
          <a href="../html/edit.html?id=${data.id}" class="card-link">Edit</a>
          <a href="../html/detail.html?id=${data.id}" class="card-link text-danger">delete</a>
        </div>
      </div>`

  })
  postsdiv.innerHTML=div
}
window.addEventListener("DOMContentLoaded", allPosts())
 /*let  answer= "hello world!!!!"
 console.log(answer)
 document.getElementById("postsdiv").innerHTML=answer*/
