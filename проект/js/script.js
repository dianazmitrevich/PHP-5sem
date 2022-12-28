'use strict'

window.onload = () => {
    let fields = document.querySelectorAll(".form__field");

    fields.forEach(element => {
        let input = element.querySelector("input");
        let label = element.querySelector("label");

        if (input.value != "") {
            label.classList.add("label-active")
        }

        element.addEventListener("input", () => {
            input.value != "" ? label.classList.add("label-active") : label.classList.remove("label-active");
        });
    });

    let e = document.querySelector(".form__captcha");
    let i = e.querySelector("input");
    let l = e.querySelector("label");

    if (i.value != "") {
        l.classList.add("label-active")
    }

    e.addEventListener("input", () => {
        i.value != "" ? l.classList.add("label-active") : l.classList.remove("label-active");
    });
}