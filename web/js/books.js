async function requestCalc(name) {
    const res = await fetch("/books/search", {
        method: "post",
        body: JSON.stringify({
            name: name,
        })
    })
    const result = await res.json();
    console.log(result["res"]);
}

let form = document.getElementById('form');
console.log(form);

form.addEventListener("submit", (evt) => {
    evt.preventDefault();
    let name = form.elements.namedItem("name");
    console.log(name.value);
    requestCalc(name.value);
});
