const deleteButton = document.querySelector('#delete-button');

deleteButton.addEventListener('click', function () {
    const data = {
        idToDelete : id
    };

    let buttonName = deleteButton.getAttribute("name");
    let url;

    if (buttonName === 'team') {
        url = '/deleteTeam';
    } else {
        url = '/deleteEvent';
    }

    fetch(url, {
        method : "POST",
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    }).then(function () {
        window.location.href='mainpage';
    });
})