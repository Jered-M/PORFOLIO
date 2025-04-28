document.addEventListener('mousemove', (event) => {
    const body = document.body;

    // Crée une bulle
    const bubble = document.createElement('div');
    bubble.classList.add('bubble');
    bubble.style.left = `${event.clientX}px`;
    bubble.style.top = `${event.clientY}px`;

    // Ajoute la bulle au body
    body.appendChild(bubble);

    // Supprime la bulle après l'animation
    bubble.addEventListener('animationend', () => {
        bubble.remove();
    });
});

document.addEventListener('mouseleave', () => {
    // Désactive l'effet lorsque la souris quitte la fenêtre
    document.body.classList.remove('active');
});
