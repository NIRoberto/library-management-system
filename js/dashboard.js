const users = [
  {
    id: 1,
    FullName: "Robert Niyitanga",
    email: "robertwilly668@gmail.com",
    password: "Sabin1234",
  },
  {
    id: 4,
    FullName: "Sabin Kwizera",
    email: "robertwilly668@gmail.com",
    password: "Sabin1234",
  },
  {
    id: 6,
    FullName: "Sabin Kwizera",
    email: "robertwilly668@gmail.com",
    password: "Sabin1234",
  },
  {
    id: 5,
    FullName: "Sabin Kwizera",
    email: "robertwilly668@gmail.com",
    password: "Sabin1234",
  },
];

let Users = document.querySelector(".users");

window.addEventListener("DOMContentLoaded", function () {
  displayMenuItems(users);
});

function displayMenuItems(menuitems) {
  let item = menuitems.map((item) => {
    return `
       <tr>
        <td>
            1
        </td>
        <td>
            ${item.fullname}
        </td>
        <td>
        ${item.email}
        </td>
        <td>
   ${item.password}
        </td>
        
    </tr>
      `;
  });

  item = item.join("");
  console.log(item);
  Users.innerHTML = item;
}

console.log("Hello");
