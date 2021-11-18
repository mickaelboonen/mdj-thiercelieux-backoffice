# Routes


| URL | HTTP Method | Controller | Method | Title | Content | Comment |
|--|--|--|--|--|--|--|
| `/` | `GET` | `MainController` | `home` | MdJ Thiercelieux Backoffice | Backoffice dashboard | - |
| `/roles` | `GET`| `RoleController` | `list` | Liste des rôles cachés | Roles list | - |
| `/roles/add` | `GET`| `RoleController` | `add` | Ajouter un rôle | Form to add a roles | - |
| `/roles/create` | `POST`| `RoleController` | `create` | Créer un rôle | Form to create a new role | - |
| `/roles/edit/[i:roleId]` | `GET`| `RoleController` | `edit` | Modifier un rôle | Form to edit a role | [i:roleId] is the role to edit |
| `/roles/update/[i:roleId]` | `POST`| `RoleController` | `update` | Éditer un rôle | Form to update a role | [i:roleId] is the role to update |
| `/roles/delete/[i:roleId]` | `GET`| `RoleController` | `delete` | Supprimer un rôle | roles delete | [i:roleId] is the role to delete |
| `/cards` | `GET`| `CardController` | `list` | Liste des cartes Nouvelle Lune | Cards list | - |
| `/cards/add` | `GET`| `CardController` | `add` | Ajouter une carte | Form to add a cards | - |
| `/cards/create` | `POST`| `CardController` | `create` | Créer une carte | Form to create a new card | - |
| `/cards/edit/[i:cardId]` | `GET`| `CardController` | `edit` | Modifier une carte | Form to edit a card | [i:cardId] is the card to edit |
| `/cards/update/[i:cardId]` | `GET`| `CardController` | `update` | Éditer une carte | Form to update a card | [i:cardId] is the card to update |
| `/cards/delete/[i:cardId]` | `GET`| `CardController` | `delete` | Supprimer une carte | cards delete | [i:cardId] is the card to delete |
| `/village-people` | `GET`| `VillageController` | `list` | Liste des Villageois | village-people list | - |
| `/village-people/add` | `GET`| `VillageController` | `add` | Ajouter un villageois | Form to add a village-people | - |
| `/village-people/create` | `POST`| `RoleController` | `create` | Créer un villageois | Form to create a new village-people | - |
| `/village-people/edit/[i:villageId]` | `GET`| `VillageController` | `edit` | Modifier un villageois | Form to edit a village-people | [i:villageId] is the village-people to edit |
| `/village-people/update/[i:villageId]` | `GET`| `VillageController` | `update` | Éditer un villageois | Form to update a village-people | [i:villageId] is the village-people to update |
| `/village-people/delete/[i:villageId]` | `GET`| `VillageController` | `delete` | Supprimer un villageois | village-people delete | [i:villageId] is the village-people to delete |
| `/XXX` | `GET`| `YYYController` | `list` | Liste des WWW | XXX list | - |
| `/XXX/add` | `GET`| `YYYController` | `add` | Ajouter un WWW | Form to add a XXX | - |
| `/XXX/create` | `POST`| `RoleController` | `create` | Créer un WWW | Form to create a new XXX | - |
| `/XXX/edit/[i:zzzId]` | `GET`| `YYYController` | `edit` | Modifier un WWW | Form to edit a XXX | [i:zzzId] is the XXX to edit |
| `/XXX/update/[i:zzzId]` | `GET`| `YYYController` | `update` | Éditer un WWW | Form to update a XXX | [i:zzzId] is the XXX to update |
| `/XXX/delete/[i:zzzId]` | `GET`| `YYYController` | `delete` | Supprimer un WWW | village-people delete | [i:zzzId] is the village-people to delete |
