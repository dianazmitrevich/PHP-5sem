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
}