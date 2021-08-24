# language: fr
Fonctionnalité: Test d'intégration de ContactRepository

  Scénario: Test de findByEntrepreuneurEmail l'entrepreneur avec l'email "user11@entrepreneur.com" a déjà envoyé des messages
    Etant donné que l'entrepreneur "user11@entrepreneur.com" a déjà envoyé des messages
    Alors la méthode findByEntrepreuneurEmail me retourne un tableau contenant ces messages
  
  Scénario: Test de findByEntrepreuneurEmail l'entrepreneur avec l'email "user11@entrepreneur.com" n'a pas envoyé de message
    Etant donné que l'entrepreneur "user9@entrepreneur.com" n'a pas envoyé de message
    Alors la méthode findByEntrepreuneurEmail retourne un tableau vide