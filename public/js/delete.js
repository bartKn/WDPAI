const deleteButton = document.querySelector('#delete-button');

function deleteEvent () {
    const data = {
        idToDelete : id
    };

    if (deleteButton === null) {
        return;
    }

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
}