// 1. Hover Effekt (wie vorher)
const cards = document.querySelectorAll('.glass-card');
cards.forEach(card => {
    card.addEventListener('mousemove', (e) => {
        const rect = card.getBoundingClientRect();
        const x = e.clientX - rect.left;
        const y = e.clientY - rect.top;
        card.style.setProperty('--mouse-x', `${x}px`);
        card.style.setProperty('--mouse-y', `${y}px`);
    });
});

// 2. Event Erstellen Logik
const addBtn = document.getElementById('addEventBtn');
// WICHTIG: Hier muss die ID exakt mit der im HTML übereinstimmen!
const eventList = document.getElementById('event-list'); 

addBtn.addEventListener('click', () => {
    // Werte aus den Feldern holen
    const title = document.getElementById('inpTitle').value;
    const day = document.getElementById('inpDay').value;
    const month = document.getElementById('inpMonth').value;
    const loc = document.getElementById('inpLoc').value;

    // Einfache Prüfung, ob alles ausgefüllt ist
    if(title === "" || day === "" || month === "") {
        alert("Bitte zumindest Titel und Datum angeben!");
        return;
    }

    // HTML für das neue Element bauen
    // Wir nutzen Backticks (`), um HTML einfach im JS zu schreiben
    const newEventHTML = `
        <div class="event-item" style="animation: fadeIn 0.5s ease;">
            <div class="date-box">
                <span class="day">${day}</span>
                <span class="month">${month}</span>
            </div>
            <div class="event-info">
                <h3>${title}</h3>
                <p>${loc}</p>
            </div>
        </div>
    `;

    // Das neue HTML vorne an die Liste anfügen.
    // 'afterbegin' fügt es als erstes Kind-Element in 'event-list' ein.
    eventList.insertAdjacentHTML('afterbegin', newEventHTML);

    // Felder leeren nach dem Absenden
    document.getElementById('inpTitle').value = "";
    document.getElementById('inpDay').value = "";
    document.getElementById('inpMonth').value = "";
    document.getElementById('inpLoc').value = "";
});

console.log("Abi '27 System bereit. JS geladen.");