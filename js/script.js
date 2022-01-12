let checks = document.querySelectorAll('[id^=check]');

for(let i = 0; i < checks.length; i++) {
checks[i].addEventListener('change', function(){
if (checks[i].checked) {
        let input = document.createElement("input");
        input.setAttribute("class", "quantity-input")
        input.setAttribute("type", "number")
        input.setAttribute("id", "quantity-"+i);
        input.setAttribute("name", "quantities[]")
        input.setAttribute("placeholder", "Cantidad")
        checks[i].parentNode.parentNode.appendChild(input);
} else {
        checks[i].parentNode.parentNode.removeChild(document.getElementById("quantity-"+i));
        }
});
};