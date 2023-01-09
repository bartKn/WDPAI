const participantsContainer = document.querySelector('.participants-container');
const button = document.querySelector('#signup');
const signed = document.querySelector('#signed');

button.addEventListener('click', function () {
    const data = {
      eventId : id
    };

    fetch("/signupForEvent", {
        method : "POST",
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    }).then(function (response) {
        return response.json();
    }).then(function (participants) {
        signed.innerHTML = parseInt(signed.innerHTML) + 1;
        disableButton();
        participantsContainer.innerHTML = "";
        loadParticipants(participants);
    })
});

function disableButton() {
    button.disabled = true;
}


function loadParticipants(participants) {
    participants.forEach(participant => {
        console.log(participant);
        createParticipant(participant);
    })
}

function createParticipant(participant) {
    const template = document.querySelector("#participant-template");
    const clone = template.content.cloneNode(true);

    const a = clone.querySelector("a");
    a.href = `profile?id=${participant.id}`;

    const name = clone.querySelector("#participant-name");
    name.innerHTML = participant.name + ' ' + participant.surname;

    const team = clone.querySelector("#participant-team");
    team.innerHTML = participant.team;

    participantsContainer.appendChild(clone);
}

