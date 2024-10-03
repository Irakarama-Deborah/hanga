const id=URLSearchParams(window.location.Search).get("id")
const singlepost = async () => {
    const post =await fetch (url + `/${id}`)
    const res = await post.json()
}
singlepost()