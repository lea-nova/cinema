console.log("test");


let btnAdd = document.getElementById("btnAdd");

// btnAdd.addEventListener('click', () => {
//     console.log('click');
//     let contenuADupliquer = document.getElementById("container-ajouter");
//     let contenuAMettre = document.getElementById("container-a-mettre");

//     // Créer une copie du contenu à dupliquer
//     contenuAMettre.innerHTML = contenuADupliquer;

//     // Ajouter la copie à la fin de la div container-a-mettre
//     contenuAMettre.appendChild(copieContenu.innerHTML);
// });

// document.addEventListener('DOMContentLoaded', function () {
//     let btnAdd = document.getElementById("btnAdd");

//     btnAdd.addEventListener('click', () => {
//         console.log('click');
//         let contenuADupliquer = document.getElementById("container-a-mettre");

//         // Créer une copie du contenu à dupliquer
//         let copieContenu = contenuADupliquer.cloneNode(true);

//         // Retirer l'ID de la copie pour éviter les duplications d'ID
//         copieContenu.removeAttribute('id');

//         // Attacher un événement de suppression à chaque bouton delete dans la copie
//         let btnDelete = copieContenu.querySelector('.btnDelete');
//         btnDelete.addEventListener('click', () => {
//             copieContenu.remove();
//         });

//         // Ajouter la copie à la fin de la div container-ajouter
//         document.getElementById("container-ajouter").appendChild(copieContenu);
//     });

//     // Attacher l'événement de suppression au bouton delete initial
//     document.querySelectorAll('.btnDelete').forEach(button => {
//         button.addEventListener('click', function () {
//             this.closest('.row').remove();
//         });
//     });
// });