Builder

Présentation

Si vous êtes en face d'une classe qui comporte beaucoup de paramètres dans son constructeur et que certains d'entre eux sont facultatifs, alors vous pouvez utiliser le design Builder.

La création de l'objet en question est alors déléguée à une classe Builder qui permettra d'appeler différentes méthodes selon les besoins. Une fois l'objet correctement configuré, on appelle la méthode build qui retourne l'instance toute fraîche.

On peut utiliser en plus du builder un director. Le director est un peu l'équivalent d'un menu au restaurant. Il connait les différentes recettes pour créer tel ou tel plat.

Avantages

- Permet de paramétrer la création de l'objet sur mesure.
- Meilleure lisibilité du code.
- Permet de réutiliser des recettes de création simplement (pour créer des variantes à l'aide du directeur).
- Isolation de la création de l'objet.
- Facilite la maintenabilité du code.

Inconvénients

- Code plus complexe avec de nouvelles classes.
