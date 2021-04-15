# RPG Game Sim

## Mettez en oeuvre les prémices d'un jeu de rôle 

Les persos :

3 classes de perso
- Guerrier (Resistance physique)
- Mage (Resistance magique)
- Voleur (Resistance pièges)

Chacun ont 10 points de vie


Les evenements :

Il ya 3 type de dégats
- Physiques
- Magiques
- Pièges

Au fur est à mesure de leur avancée nos héros rencontre des obstacles, vous deveez mettre en oeuvre les obstacles et gérer la vie des héros


Déroulé
1. crééer un groupe de persos (mini 3 persos, au moins 1 de chaque classe)
2. en aléatoire leur faire subir des obstacles (4 types mini, avec des caractéristiques différentes), jusqu'a ce que'il en reste 1

Exemples d'evenements avec dégats : 
    Fleche empoisonnée :    Ph:1pt M:0pt, P:4pt 
    Epée :                  Ph:4pt M:0pt, P:0pt 
    boule de feu :          Ph:2pt M:4pt, P:0pt 
    Epée de feu :           Ph:4pt M:4pt, P:0pt 


Exemple de scénario et de sortie console : 

Evenenement coup d'épée (-4 PV)
- Will le guerrier prend un coup d'eppée (-1 PV)
- Nora la voleuse prend un coup d'eppée (-3 PV)
- Kevin le mage prend un coup d'eppée (-4 PV)

Evenenement fire ball (-4 PV)
- Will le guerrier prend un coup d'eppée (-3 PV)
- Nora la voleuse prend un coup d'eppée (-4 PV)
- Kevin le mage prend un coup d'eppée (-1 PV)

.....

Le jeu s'arrete quand il reste 1 seul joueur





Note technique

4 classe CPP : 
    Heroe
    Event
    EventFactory
    HeroesFactory



Vous pouvez utiliser des fichiers / base de données pour charger et sauver/crrer les persos, les events et les parties jouées
