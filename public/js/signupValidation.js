let form = document.querySelector('form');
form.addEventListener('submit',(event)=>{

    event.preventDefault();

    let children = event.target.querySelectorAll('input, textarea, select');
    let findEmpty = Array.from(children).find((element)=>{
        return element.value.trim().length < 1;
    });

    if (findEmpty) {
        alert('Please fill all fields');
    } else if (!isEmailValid()){
        alert('Email is not valid!');
    } else if (!arePasswordsEqual()) {
        alert('Passwords must be equal!');
    } else {
        event.target.submit();
    }
});

function isEmailValid() {
    let emailInput = form.querySelector('input[name="email"]');

    return String(emailInput.value)
        .toLowerCase()
        .match(
            /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
        );
}

function arePasswordsEqual() {
    let password = form.querySelector('input[name="password"]').value;
    let confirmedPassword = form.querySelector('input[name="confirmedPassword"]').value;

    return password === confirmedPassword;
}