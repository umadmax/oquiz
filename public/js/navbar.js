document.addEventListener('DOMContentLoaded', () => {

  const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

  if($navbarBurgers.length > 0) {
    $navbarBurgers.forEach($el => {
      $el.addEventListener('click', () => {
        let target = $el.dataset.target;
        const $target = document.querySelector(`#${target}`);

        $el.classList.toggle('is-active');
        $target.classList.toggle('is-active');
      })
    })
  }

});