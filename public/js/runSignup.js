const eventsContainer = document.querySelector('.items-container');

eventsContainer.addEventListener('click', function (event) {
    const isButton = event.target.nodeName === 'BUTTON';
    if (!isButton) {
        return;
    }

    const button = event.target;

    const data = {
        runId : event.target.name
    };

    fetch("/signupForRun", {
        method : "POST",
        headers : {
            'Content-Type': 'application/json'
        },
        body : JSON.stringify(data)
    }).then(function () {
        disableButton(button);
    })
});

function disableButton(button) {
    button.disabled = true;
}

let form = document.querySelector('form');
form.addEventListener('submit', (event) => {

    event.preventDefault();

    let children = event.target.querySelectorAll('input, textarea, select');
    let findEmpty = Array.from(children).find((element)=>{
        return element.value.trim().length < 1;
    });

    if (findEmpty) {
        alert('Please fill all fields');
    } else if (!isHourValid()) {
        alert('Please choose hour from future');
    } else {
        event.target.submit();
    }

})

function isHourValid() {
    let hourInput = document.querySelector('input[name="time"]').value;

    let currentDate = new Date();
    let currentTime = currentDate.getHours() + ":"
                    + currentDate.getMinutes();

    return hourInput > currentTime;
}