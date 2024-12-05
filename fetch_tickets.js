document.addEventListener("DOMContentLoaded", () => {
    const ticketContainer = document.getElementById("ticket-container");

    // Fetch tickets from the SiteGround server
    fetch("https://https://elaa.sg-host.com/fetchticket.php")
        .then((response) => response.json())
        .then((data) => {
            // Loop through the tickets and create HTML for each one
            data.forEach((ticket) => {
                const ticketCard = document.createElement("div");
                ticketCard.classList.add("ticket-card");

                ticketCard.innerHTML = `
                    <h3>${ticket.event_name}</h3>
                    <p>Date: ${ticket.event_date}</p>
                    <p>Price: $${ticket.price}</p>
                    <p>${ticket.description}</p>
                    <button class="buy-button" data-id="${ticket.id}">Buy Ticket</button>
                `;

                ticketContainer.appendChild(ticketCard);
            });
        })
        .catch((error) => {
            console.error("Error fetching tickets:", error);
        });
});
