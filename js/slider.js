let slideAmount = 0;
let isTransitioning = false;


const sliderImages = document.getElementsByClassName('slider-images')[0];
const sliderImagesContainer = document.getElementsByClassName('slider-images-wrapper')[0];

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

