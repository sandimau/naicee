let carts = document.querySelectorAll(".btn-produk");
let cartPopular = document.querySelectorAll(".btn-popular");

let products = [
    {
        name: "sandi",
        id: 1,
    },
    {
        name: "test",
        id: 2,
    },
];

for (let i = 0; i < carts.length; i++) {
    carts[i].addEventListener("click", () => {
        let id = carts[i].getAttribute("product");
        cartNumbers(id);
        setItems(id);
    });
}

for (let i = 0; i < cartPopular.length; i++) {
    cartPopular[i].addEventListener("click", () => {
        cartNumbers();
    });
}

function onLoadCartNumbers() {
    let productNumbers = localStorage.getItem("cartNumbers");
    let iconCart = document.querySelector(".badgee");
    if (productNumbers) {
        iconCart.classList.remove("hidecart");
        iconCart.textContent = productNumbers;
    } else {
        iconCart.classList.add("hidecart");
    }
}

function cartNumbers(id) {
    let productNumbers = localStorage.getItem("cartNumbers");
    let iconCart = document.querySelector(".badgee");
    productNumbers = parseInt(productNumbers);
    if (productNumbers) {
        localStorage.setItem("cartNumbers", productNumbers + 1);
        iconCart.textContent = productNumbers + 1;
    } else {
        iconCart.textContent = 1;
        localStorage.setItem("cartNumbers", 1);
        onLoadCartNumbers();
    }
}

function setItems(id) {

}

onLoadCartNumbers();
