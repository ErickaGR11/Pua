import lottie from 'lottie-web';

document.addEventListener("DOMContentLoaded", () => {
    lottie.loadAnimation({
        container: document.getElementById('lottie-edit'),
        renderer: 'svg',
        loop: true,
        autoplay: true,
        path: '/animaciones/edit.json' // asegúrate de que exista en /public/animaciones/
    });
});
