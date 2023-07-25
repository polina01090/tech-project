async function request(name) {
    const res = await fetch("/books/search", {
        method: "post",
        body: JSON.stringify({
            name: name,
        })
    })
    const result = await res.json();
    console.log(result["res"]);
}
alert('djjw')
let form = document.forms['search_book'];
console.log(form);
form.addEventListener("submit", (evt) => {
    evt.preventDefault();
    let name = form.elements.namedItem("count");
    console.log(name.value);
    request(name);
})