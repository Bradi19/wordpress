function getFile() {
    document.getElementById("upfile").click();
}
const file = document.querySelector('.filer');
file.addEventListener('click', getFile);

const inputs = document.querySelectorAll('.texter-input input');
let div = document.createElement('div');
inputs.forEach(input => {
    input.addEventListener('input', (e) => {
        console.log(e);
        if (e.target.name === 'adder_text') {
            div.innerHTML = e.value;
        }
    })
})