const cardsContainer = document.getElementById('cards-container');

fetch('datos.php')
    .then(response => response.json())
    .then(data => {
        data.forEach(element => {
            const card = document.createElement('div');
            card.classList.add('card');

            const cardHeader = document.createElement('h3');
            cardHeader.textContent = element.nombre;

            const cardDescription = document.createElement('p');
            cardDescription.textContent = element.descripcion;

            const cardPrice = document.createElement('span');
            cardPrice.textContent = `Precio: $${element.precio}`;

            const cardRating = document.createElement('span');
            cardRating.textContent = `Calificación: ${element.calificacion}`;

            card.appendChild(cardHeader);
            card.appendChild(cardDescription);
            card.appendChild(cardPrice);
            card.appendChild(cardRating);

            cardsContainer.appendChild(card);
        });
    });