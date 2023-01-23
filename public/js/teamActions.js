const joinButton = document.querySelector("#join-button");
const membersContainer = document.querySelector(".members-container");
const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);

function joinTeam() {

    if (joinButton === null) {
        return;
    }
    const data = {
        teamName : urlParams.get('n')
    };

    console.log(data);

    fetch("/joinTeam", {
        method : "POST",
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    }).then(function (response) {
        return response.json();
    }).then(function (members) {
        membersContainer.innerHTML = "";
        loadMembers(members);
    })
}


function loadMembers(members) {
    members.forEach(member => {
        console.log(member);
        createMember(member);
    })
}

function createMember(member) {
    const template = document.querySelector("#members-template");
    const clone = template.content.cloneNode(true);

    const a = clone.querySelector("a");
    a.href = `profile?id=${member.id}`;

    const name = clone.querySelector("#member-name");
    name.innerHTML = member.name + ' ' + member.surname;

    const email = clone.querySelector("#member-email");
    email.innerHTML = member.email;

    membersContainer.appendChild(clone);
}