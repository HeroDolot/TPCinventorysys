const btn = document.querySelector('#btn');
const MyForm = document.querySelector('#MyForm');
const Msg = document.querySelector('#Msg');
const username = document.querySelector('#username');
const password = document.querySelector('#password');

btn.addEventListener("click", function(e) {

    e.preventDefault();

    if (username.value.length === 0 || password.value.length === 0) {
        console.log('False');
        Msg.innerHTML = "<h6 class='error'>Please Complete Details</h6>"
        setTimeout(() => document.querySelector('.error') .remove(), 2500)
    }else {
        console.log('True')
        MyForm.submit();
    }

});


