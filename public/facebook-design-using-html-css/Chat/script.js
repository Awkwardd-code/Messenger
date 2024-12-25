const toggleButton = document.querySelector('.dark-light');
const colors = document.querySelectorAll('.color');

colors.forEach(color => {
  color.addEventListener('click', (e) => {
    colors.forEach(c => c.classList.remove('selected'));
    const theme = color.getAttribute('data-color');
    document.body.setAttribute('data-theme', theme);
    color.classList.add('selected');
  });
});

toggleButton.addEventListener('click', () => {
  document.body.classList.toggle('dark-mode');
});

/* document.addEventListener("DOMContentLoaded", function () {
  const container = document.querySelector(".chat-area-main");
  

  // Scroll to the bottom on page load
  container.scrollTop = container.scrollHeight;

}); */
/* document.addEventListener("DOMContentLoaded", function () {
  const container = document.querySelector(".chat-area");

  // Scroll to the bottom on load
  container.scrollTop = container.scrollHeight;

  // Optional: If content loads dynamically, re-scroll to the bottom
  container.addEventListener("DOMNodeInserted", () => {
    container.scrollTop = container.scrollHeight;
  });
}); */