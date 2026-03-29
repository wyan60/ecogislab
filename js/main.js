document.addEventListener('DOMContentLoaded', function () {
  var toggle = document.querySelector('.menu-toggle');
  var nav = document.querySelector('.headernav');

  if (toggle && nav) {
    toggle.addEventListener('click', function () {
      toggle.classList.toggle('active');
      if (nav.classList.contains('open')) {
        nav.classList.remove('open');
        nav.style.display = 'none';
      } else {
        nav.classList.add('open');
        nav.style.display = 'block';
      }
    });
  }

  var observer = new IntersectionObserver(
    function (entries) {
      entries.forEach(function (e) {
        if (e.isIntersecting) e.target.classList.add('visible');
      });
    },
    { threshold: 0.1, rootMargin: '0px 0px -30px 0px' }
  );
  document.querySelectorAll('.fade-in').forEach(function (el) {
    observer.observe(el);
  });
});
