window.onload = function () {
    var map = L.map('map').setView([-23.6318925, -46.6967155], 16); // São Paulo

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; OpenStreetMap contributors'
    }).addTo(map);

    L.marker([-23.6318925, -46.6967155]).addTo(map)
        .bindPopup("Minha Localização")
        .openPopup();

    // Aguarda um pequeno tempo para garantir que os tiles sejam carregados antes de imprimir
    setTimeout(() => {
        window.print();
    }, 1000);
};