const data = [
  {
    id: 1,
    title: "Anatomy",
    category: "Technology",
    img: "/assets/images/anatomy.jpg",
  },
  {
    id: 2,
    title: "Anatomy",
    category: "Technology",
    img: "/assets/images/anatomy.jpg",
  },
  {
    id: 3,
    title: "Anatomy",
    category: "Science",
    img: "/assets/images/anatomy.jpg",
  },
  {
    id: 4,
    title: "Anatomy",
    category: "Religous",
    img: "/assets/images/anatomy.jpg",
  },
  {
    id: 5,
    title: "Anatomy",
    category: "History",
    img: "/assets/images/anatomy.jpg",
  },
  {
    id: 6,
    title: "Anatomy",
    category: "Life",
    img: "/assets/images/anatomy.jpg",
  },
  {
    id: 7,
    title: "jhjhgjhkjhghj",
    category: "Geagraphy",
    img: "/assets/images/c++.jpg",
  },
];

let books = document.querySelector(".list");
let filterBtn = document.querySelectorAll(".filterBtn");

window.addEventListener("DOMContentLoaded", function () {
  displayMenuItems(data);
});

filterBtn.forEach(function (btn) {
  btn.addEventListener("click", function (e) {
    const category = e.currentTarget.dataset.id;
    console.log(category);

    const menuCategory = data.filter(function (menuItem) {
      if (menuItem.category == category) {
        return menuItem;
      }
    });
    if (category == "all") {
      displayMenuItems(data);
    } else {
      displayMenuItems(menuCategory);
    }
  });
});

function displayMenuItems(menuitems) {
  let item = menuitems.map((item) => {
    return `
        <div>
         <img src="${item.img}" alt="Images">
            <h5>${item.title}</h5>
       </div>
      `;
  });

  item = item.join("");
  books.innerHTML = item;
}
