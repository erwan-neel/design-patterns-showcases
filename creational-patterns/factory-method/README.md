Factory Method

Présentation

La factory method remplace les appels directs aux constructeurs d'objets (opérateur new) depuis le code client.
Cette méthode contient la logique qui permet d'instancier un objet et l'ensemble de ses éventuelles dépendances.

En pratique, cette factory method est déclarée dans une classe abstraite (une abstract factory). Ce sont les classes filles qui implémentent cette méthode en fonction de l'objet à retourner. Pour chaque nouvel objet (respectant toujours le Type de retour définit par la factory method), on devra créer une nouvelle classe qui héritera de la classe abstraite.

L'ensemble des objets retournés par cette factory method doit respecter un Type préalablement définit dans une interface.

Le code client, en utilisant la classe abstraite, récupèrera les objets dont il a besoin sans en connaître la réelle nature.

Ce faisant, on bénéficie des avantages suivants :

- Le code client se base désormais sur le quoi (abstraction) et non sur une implémentation spécifique (tel ou tel objet).
- Il est facile d'ajouter un nouvel object selon le principe ouvert/fermé (ouvert à l'extension, fermé à la modification)
- La logique de création d'un objet parfois complexe est centralisé en un seul endroit dans le code, ce qui facilite sa réutilisation et améliore sa maintenabilité.

Inconvénients :

- Le code devient plus complexe par l'ajout de nouvelles classes.
