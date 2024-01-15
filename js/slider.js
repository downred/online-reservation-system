let slideAmount = 0;
let isTransitioning = false;
const imageUrls = [
    './images/hotel1.jpg',
    './images/hotel3.jpg',
    './images/hotel4.jpg',
    './images/hotel5.jpg',
    './images/hotel6.jpg',
    './images/hotel8.jpg',
    './images/hotel9.jpg',
    './images/hotel10.jpg',
    './images/hotel11.jpg',
    './images/hotel12.jpg',
    './images/hotel13.jpg'
];

const sliderImages = document.getElementsByClassName('slider-images')[0];
const sliderImagesContainer = document.getElementsByClassName('slider-images-wrapper')[0];

imageUrls.forEach((url, index) => {
    const imageElement = document.createElement('div');
    imageElement.classList.add('slider-img');
    imageElement.innerHTML = `<img src="${url}" alt="Image ${index + 1}">`;
    sliderImages.appendChild(imageElement);
});

const scrollDistance = 500;

function slideRight() {
    const newScrollPosition = sliderImagesContainer.scrollLeft + scrollDistance;

    sliderImagesContainer.scrollTo({
        left: newScrollPosition,
        behavior: 'smooth'
    });
}

function slideLeft() {
    const newScrollPosition = sliderImagesContainer.scrollLeft - scrollDistance;

    sliderImagesContainer.scrollTo({
        left: newScrollPosition,
        behavior: 'smooth'
    });
}

