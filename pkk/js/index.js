window.addEventListener('scroll', function() {
    const parallaxContainer = document.getElementById('parallax');
    const scrollPosition = window.pageYOffset;
    parallaxContainer.style.transform = 'translateY(' + scrollPosition * -0.5 + 'px)';
    parallaxContainer.style.transitionTimingFunction = 'ease';
    parallaxContainer.style.transitionDuration = '0.5s';
});

window.addEventListener('scroll', function() {
    const parallaxContainer = document.getElementById('parallax2');
    const scrollPosition = window.pageYOffset;
    parallaxContainer.style.transform = 'translateY(' + scrollPosition * -0.3 + 'px)';
    parallaxContainer.style.transitionTimingFunction = 'ease';
    parallaxContainer.style.transitionDuration = '0.5s';
});

window.addEventListener('scroll', function() {
  const parallaxContainer = document.getElementById('parallax3');
  const scrollPosition = window.pageYOffset;
  parallaxContainer.style.transform = 'translateX(' + scrollPosition * -0.6 + 'px)';
  parallaxContainer.style.transitionTimingFunction = 'ease';
});