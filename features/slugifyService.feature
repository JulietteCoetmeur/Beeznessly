# language: fr
Fonctionnalité: Slugify Service

  Scénario: Test de la méthode generate de Slugify service avec un nom
    Etant donné que j'ai une string "Jacques Dutronc"
    Alors j'obtiens le slug suivant "jacques-dutronc"

  Scénario: test avec des caractères spéciaux
    Etant donné que j'ai une string "HelLO c'est raphaël@wCs.com"
    Alors j'obtiens le slug suivant "hello-c-est-raphael-wcs-com"