  // Array che simula l'archiviazione dei dati
  const services = [];

  // Funzione per gestire il submit del form
  document.getElementById('serviceForm').addEventListener('submit', function(event) {
      event.preventDefault();  // Impedisce il comportamento predefinito del form

      // Recupera i valori dal form
      const descrizioneServizio = document.getElementById('descrizione_servizio').value;
      const prezzoServizio = document.getElementById('prezzo_servizio').value;

      // Verifica che i campi siano compilati
      if (!descrizioneServizio || !prezzoServizio) {
          alert('Please fill out all fields');
          return;
      }

      // Crea un oggetto per il servizio
      const newService = {
          id_servizio: services.length + 1,  // Genera un ID incrementale
          descrizione_servizio: descrizioneServizio,
          prezzo_servizio: prezzoServizio
      };

      // Aggiunge il nuovo servizio all'array
      services.push(newService);

      // Mostra un messaggio di successo
      document.getElementById('message').innerHTML = `<p>Servizio aggiunto con successo!<br><strong>${descrizioneServizio}</strong> - €${prezzoServizio}</p>`;

      // Pulisce i campi del form
      document.getElementById('serviceForm').reset();
  });
