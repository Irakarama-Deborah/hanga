const myid= new URLSearchParams(window.location.search).get('id')

const singlep = async () => {
    const p=await fetch (url + `/${id}`)
    const resu = await p.json()
}
singlep()
  