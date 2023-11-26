let slideAmount = 0;

let imageUrls =
    ['./images/hotel1.jpg',
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
    ]

let sliderImages = document.getElementsByClassName('slider-images')[0];

console.log("yes aiyah")
imageUrls.forEach((url, index) => {
    const imageElement = document.createElement('div');
    imageElement.classList.add('slider-img');
    imageElement.innerHTML = `<img src="${url}" alt="Image ${index + 1}">`;

    sliderImages.appendChild(imageElement);
})

function slideRight() {
    let sliderImages = document.getElementsByClassName('slider-images')
    const remainingSpace = sliderImages.scrollWidth - (sliderImages.clientWidth + slideAmount);

    console.log("test")

    console.log({remainingSpace})

    if (remainingSpace >= 350) {
        slideAmount = slideAmount - 350;
    } else {
        slideAmount = sliderImages.scrollWidth - sliderImages.clientWidth;

    }

    sliderImages[0].style.transform = `translateX(${slideAmount}px)`
}

function slideLeft() {
    let sliderImages = document.getElementsByClassName('slider-images')

    console.log("test")

    slideAmount = slideAmount + 350;

    sliderImages[0].style.transform = `translateX(${slideAmount}px)`
}