console.log('coucou');

function changeButton(id) {
  console.log('je change le bouton !');
  if (id === "menu-open"){
    document.getElementById('menu-open').style.display = "none";
    document.getElementById('menu-close').style.display = "inline-block";
    return true ;
  }
  document.getElementById('menu-close').style.display = "none";
  document.getElementById('menu-open').style.display = "inline-block";
  return true ;

}

// function changeNavDisplay(id) {
//   console.log('je change le menu !');
//   if (id === "menu-open"){
//     document.getElementById('menu').style.display = "block";
//     return true;
//   }
//   document.getElementById('menu').style.display = "none";
//   return true;
// }


function openNav() {
  console.log('j ouvre la nav !');
    document.getElementById('menu').style.display = "block";
    return true;
}

function closeNav() {
  console.log('je ferme la nav');
  document.getElementById('menu').style.display = "none";
  return true;
}
