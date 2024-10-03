const form = document.getElementById("form")
const submt = document.querySelector("button")
const handleSubmit = async () => {
    const createpost = await fetch(url,{
        method : "POST",
        headers: {"Content-Type":"application/json"},
        body : JSON.stringify({
            //id:form.ftitle.value,
            title : form.ftitle.value,
            description : form.fdisk.value,
            views : 1
        })
    })
   // e.preventDefault()
   // console.log(form.ftitle.value)
}
submt.addEventListener("click",handleSubmit)

