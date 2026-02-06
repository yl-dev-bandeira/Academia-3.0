let currentIndex = 0;
const images = document.querySelectorAll('.carousel-slide img');
const totalImages = images.length;

function showImage(index) {
    // Achar a posição correta da imagem
    const offset = -index * 100; // Move a imagem para a esquerda baseado no índice
    document.querySelector('.carousel-slide').style.transform = `translateX(${offset}%)`;
}

function nextImage() {
    currentIndex = (currentIndex + 1) % totalImages; // Aumenta o índice ou volta para 0
    showImage(currentIndex);
}

function prevImage() {
    currentIndex = (currentIndex - 1 + totalImages) % totalImages; // Diminui o índice ou vai para o último
    showImage(currentIndex);
}

// Exibe a imagem inicial
document.addEventListener('DOMContentLoaded', () => {
    showImage(currentIndex); // Exibe a primeira imagem inicialmente

    // Trocando as imagens a cada 3 segundos
    setInterval(nextImage, 3000); 

    

    document.querySelector('.carousel-container').appendChild(nextButton);
    document.querySelector('.carousel-container').appendChild(prevButton);
});
