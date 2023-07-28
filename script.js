var burgerButtonContent = document.getElementsByClassName('fa-solid')[0];
var mobileMenu = document.getElementsByClassName('mobileNavigation')[0];

function dropDownMenu() {
  console.log('Before toggle:', mobileMenu.style.display);

  if (mobileMenu.style.display === 'none') {
    mobileMenu.style.display = 'block';
    burgerButtonContent.classList.remove('fa-bars');
    burgerButtonContent.classList.add('fa-x');
  } else {
    mobileMenu.style.display = 'none';
    burgerButtonContent.classList.remove('fa-x');
    burgerButtonContent.classList.add('fa-bars');
  }

  console.log('After toggle:', mobileMenu.style.display);
}
