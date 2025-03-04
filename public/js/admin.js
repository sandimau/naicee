let btnHapus = document.querySelectorAll(".btn-hapus");
for (let i = 0; i < btnHapus.length; i++) {
    btnHapus[i].addEventListener("click", (e) => {
        e.preventDefault();
        let url = btnHapus[i].getAttribute('href');
    });
}
