const header = document.querySelector('.sticky');
const headerHeight = header.offsetHeight;

window.addEventListener('scroll', () => {
  const scrollY = window.pageYOffset;

  if (scrollY > headerHeight) {
    header.classList.add('sticky-active');
  } else {
    header.classList.remove('sticky-active');
  }
});
