let $ = document.querySelector.bind(document)
let $$ = document.querySelectorAll.bind(document)
// add active class to selected list item

let lists = document.querySelectorAll(".navigation li");


// lists.forEach(function (item, index) {
//   let main = mains[index]

//   item.onclick = function () {
//     item.classList.remove("active");
//     this.classList.add('active')
//   }
// })


let listCards = $$(".card");
let listDetails = $$(".details");

listCards.forEach(function (listCard, index) {
  let detail = listDetails[index]

  listCard.onclick = function () {
    $('.card.active').classList.remove('active')
    $('.details.active').classList.remove('active')

    this.classList.add('active')
    detail.classList.add('active')
  }
})

// function activeLink() {
//   listCard.forEach((item) => {
//     item.classList.remove("active");
//   });
//   this.classList.add("active");
// }

// listCard.forEach((item) => item.addEventListener("click", activeLink));



// Menu Toggle
let toggle = document.querySelector(".toggle");
let navigation = document.querySelector(".navigation");
let main = document.querySelector(".main");

toggle.onclick = function () {
  navigation.classList.toggle("active");
  main.classList.toggle("active");
};

