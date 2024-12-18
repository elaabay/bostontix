async function fetchTicket() {
    try {
        const response = await fetch('https://elaa.sg-host.com/trial1.php');
        const data = await response.json();

        if (data.message) {
            document.getElementById('tickets').innerHTML = `<p>${data.message}</p>`;
        } else {
            const ticketsList = data.map(ticket => `
                <div class="ticket">
                    <h3>${ticket.event_name}</h3>
                    <p><strong>Date:</strong> ${ticket.event_date}</p>
                    <p><strong>Price:</strong> $${ticket.price}</p>
                    <p>${ticket.description}</p>
                    <button onclick="buyTicket(${ticket.id})">Buy Now</button>
                </div>
            `).join('');
            document.getElementById('tickets').innerHTML = ticketsList;
        }
    } catch (error) {
        console.error('Error fetching tickets:', error);
        document.getElementById('tickets').innerHTML = `<p>Error loading tickets. Please try again later.</p>`;
    }
}

window.onload = fetchTicket;
