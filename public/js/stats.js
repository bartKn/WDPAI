const select = document.querySelector('#period');
const eventsStats = document.querySelector('#event-stats');
const dailyStats = document.querySelector('#daily-stats');
const spinner = document.getElementById("spinner");

select.addEventListener('change', function() {
   const data = {
       period : select.value,
       id : idValue
   };

    spinner.removeAttribute('hidden');
    fetch("/getStats", {
        method : "POST",
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    }).then(function (response) {
        return response.json();
    }).then(function (stats) {
        eventsStats.innerHTML = "";
        dailyStats.innerHTML = "";
        loadStats(stats);
        spinner.setAttribute('hidden', '');
    })
});

function loadStats(stats) {
    const eventTemplate = document.querySelector('#event-stats-template');
    const eventClone = eventTemplate.content.cloneNode(true);

    const eventsNum = eventClone.querySelector('#events-num');
    eventsNum.innerHTML = stats.events;

    const eventsDistance = eventClone.querySelector('#events-distance');
    eventsDistance.innerHTML = stats.eventsDistance + ' Km';

    const eventsPosition = eventClone.querySelector('#events-position');
    eventsPosition.innerHTML = stats.eventsPosition;

    eventsStats.appendChild(eventClone);


    const dailyTemplate = document.querySelector('#daily-stats-template');
    const dailyClone = dailyTemplate.content.cloneNode(true);

    const dailyNum = dailyClone.querySelector('#daily-num');
    dailyNum.innerHTML = stats.dailyRuns;

    const dailyDistance = dailyClone.querySelector('#daily-distance');
    dailyDistance.innerHTML = stats.dailyRunsDistance + ' Km';

    dailyStats.appendChild(dailyClone);
}