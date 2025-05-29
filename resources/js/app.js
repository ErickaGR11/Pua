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

document.addEventListener("DOMContentLoaded", () => {
    lottie.loadAnimation({
        container: document.getElementById('lottie-P-anim'),
        renderer: 'svg',
        loop: true,
        autoplay: true,
        path: '/animaciones/p-animation.json' // asegúrate de que exista en /public/animaciones/
    });
});

document.addEventListener("DOMContentLoaded", () => {
    lottie.loadAnimation({
        container: document.getElementById('lottie-smell'),
        renderer: 'svg',
        loop: true,
        autoplay: true,
        path: '/animaciones/smell.json' // asegúrate de que exista en /public/animaciones/
    });
});


document.addEventListener("DOMContentLoaded", () => {
    lottie.loadAnimation({
        container: document.getElementById('lottie-checklist'),
        renderer: 'svg',
        loop: true,
        autoplay: true,
        path: '/animaciones/checklist.json' // asegúrate de que exista en /public/animaciones/
    });
});
